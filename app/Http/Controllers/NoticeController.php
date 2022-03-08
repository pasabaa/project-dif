<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Notice;
use Illuminate\Http\Request;
/**
 * Class NoticeController
 * @package App\Http\Controllers
 */
class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('can:notices.index')->only('index');
        $this->middleware('can:notices.edit')->only('edit', 'update');
        $this->middleware('can:notices.create')->only('create', 'store');
        $this->middleware('can:notices.destroy')->only('destroy');
    }

    public function index()
    {
        $notices = Notice::with('category')->select('id_Categorie')->get();

        $notices = Notice::paginate(8);

        $title = "Noticias - DIF Acámbaro";

        return view('notice.index', compact('notices', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * $notices->perPage());
    }

    public function showNotice(){
        $notices = Notice::latest()->paginate(9);

        $title = "Noticias - DIF Acámbaro";

        return view('notice.noticias', compact('notices', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * $notices->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Crear Noticia - DIF Acámbaro";
        $categories = Category::all()->pluck('categorie', 'id')->toArray();
        $notice = new Notice();
        return view('notice.create', compact('notice', 'title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Notice::$rules);

        $notice = $request->all();
        if ($image = $request->file('url')) {
            $imageDestinationPath = 'uploads/notices';
            $noticeImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $noticeImage);
            $notice['url'] = "$noticeImage";
        }

        Notice::create($notice);
        
        return redirect()->route('notices.index')
            ->with('success', 'La noticia se creó correctamente.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = Notice::find($id);
        $title = "Ver Noticia - DIF Acámbaro";

        return view('notice.show', compact('notice', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all()->pluck('categorie', 'id')->toArray();
        $notice = Notice::find($id);
        $title = "Editar Noticia - DIF Acámbaro";

        return view('notice.edit', compact('notice', 'title', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Notice $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        request()->validate(Notice::$rules);

        $input = $request->all();
        if ($image = $request->file('url')) {
            $imageDestinationPath = 'uploads/notices';
            $noticeImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $noticeImage);
            $input['url'] = "$noticeImage";
        }else{
            unset($input['url']);
        }
        $notice->update($input);

        return redirect()->route('notices.index')
            ->with('success', 'La noticia se actualizó correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $notice = Notice::find($id)->delete();
        
        return redirect()->route('notices.index')
            ->with('success', 'La noticia se eliminó correctamente.');
    }
}
