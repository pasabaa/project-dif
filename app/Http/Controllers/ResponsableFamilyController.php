<?php

namespace App\Http\Controllers;

use App\Models\ResponsableFamily;
use Illuminate\Http\Request;

/**
 * Class ResponsableFamilyController
 * @package App\Http\Controllers
 */
class ResponsableFamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('can:responsable-family.index')->only('index');
        $this->middleware('can:responsable-family.edit')->only('edit', 'update');
        $this->middleware('can:responsable-family.create')->only('create', 'store');
        $this->middleware('can:responsable-family.destroy')->only('destroy');
    }

    public function index()
    {
        $responsableFamilies = ResponsableFamily::paginate(8);
        $title = "Responsable Salud Familiar - DIF Acámbaro";
        return view('responsable-family.index', compact('responsableFamilies', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * $responsableFamilies->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $title = "Crear Responsable Salud Familiar - DIF Acámbaro";
        $responsableFamily = new ResponsableFamily();
        return view('responsable-family.create', compact('responsableFamily', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ResponsableFamily::$rules);

        $responsableFamily = ResponsableFamily::create($request->all());

        return redirect()->route('responsable-family.index')
            ->with('success', 'El responsable se creó correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $title = "Ver Responsable Salud Familiar - DIF Acámbaro";
        $responsableFamily = ResponsableFamily::find($id);
        return view('responsable-family.show', compact('responsableFamily', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Editar Responsable Salud Familiar - DIF Acámbaro";
        $responsableFamily = ResponsableFamily::find($id);
        return view('responsable-family.edit', compact('responsableFamily', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ResponsableFamily $responsableFamily
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResponsableFamily $responsableFamily)
    {
        request()->validate(ResponsableFamily::$rules);

        $responsableFamily->update($request->all());

        return redirect()->route('responsable-family.index')
            ->with('success', 'El responsable se actualizó correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $responsableFamily = ResponsableFamily::find($id)->delete();

        return redirect()->route('responsable-family.index')
            ->with('success', 'El responsable se eliminó correctamente.');
    }
}
