<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

/**
 * Class AboutController
 * @package App\Http\Controllers
 */
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('can:abouts.index')->only('index');
        $this->middleware('can:abouts.edit')->only('edit', 'update');
        $this->middleware('can:abouts.create')->only('create', 'store');
        $this->middleware('can:abouts.destroy')->only('destroy');
    }

    public function index()
    {
        $abouts = About::paginate(8);
        $title = "Acerca de - DIF Acámbaro";
        return view('about.index', compact('abouts', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * $abouts->perPage());
    }

    public function showAbout(){
        $abouts = About::paginate();
        $title = "Acerca de - DIF Acámbaro";
        return view('about.acerca', compact('abouts', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * $abouts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $about = new About();
        $title = "Crear Acerca de - DIF Acámbaro";
        return view('about.create', compact('about', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(About::$rules);

        $about = About::create($request->all());

        return redirect()->route('abouts.index')
            ->with('success', 'La información se creó correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about = About::find($id);
        $title = "Ver Acerca de - DIF Acámbaro";
        return view('about.show', compact('about', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::find($id);
        $title = "Editar Acerca de - DIF Acámbaro";
        return view('about.edit', compact('about', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  About $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        request()->validate(About::$rules);

        $about->update($request->all());

        return redirect()->route('abouts.index')
            ->with('success', 'La información se actualizó correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $about = About::find($id)->delete();

        return redirect()->route('abouts.index')
            ->with('success', 'La información se eliminó correctamente');
    }
}
