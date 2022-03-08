<?php

namespace App\Http\Controllers;

use App\Models\Modality;
use Illuminate\Http\Request;

/**
 * Class ModalityController
 * @package App\Http\Controllers
 */
class ModalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('can:modalities.index')->only('index');
        $this->middleware('can:modalities.edit')->only('edit', 'update');
        $this->middleware('can:modalities.create')->only('create', 'store');
        $this->middleware('can:modalities.destroy')->only('destroy');
    }

    public function index()
    {
        $modalities = Modality::paginate(8);
        $title = "Modalidades - DIF Acámbaro";
        return view('modality.index', compact('modalities', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * $modalities->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modality = new Modality();
        $title = "Crear Modalidad - DIF Acámbaro";
        return view('modality.create', compact('modality', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Modality::$rules);

        $modality = Modality::create($request->all());

        return redirect()->route('modalities.index')
            ->with('success', 'La modalidad se creó correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modality = Modality::find($id);
        $title = "Ver Modalidad - DIF Acámbaro";
        return view('modality.show', compact('modality', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modality = Modality::find($id);
        $title = "Editar Modalidad - DIF Acámbaro";
        return view('modality.edit', compact('modality', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Modality $modality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modality $modality)
    {
        request()->validate(Modality::$rules);

        $modality->update($request->all());

        return redirect()->route('modalities.index')
            ->with('success', 'La modalidad se actualizó correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $modality = Modality::find($id)->delete();

        return redirect()->route('modalities.index')
            ->with('success', 'La modalidad se eliminó correctamente.');
    }
}
