<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\ResponsableFamily;
use Illuminate\Http\Request;

/**
 * Class FamilyController
 * @package App\Http\Controllers
 */
class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('can:families.index')->only('index');
        $this->middleware('can:families.edit')->only('edit', 'update');
        $this->middleware('can:families.create')->only('create', 'store');
        $this->middleware('can:families.destroy')->only('destroy');
    }

    public function index()
    {
        $families = Family::paginate(8);
        $title = "Salud Familiar - DIF Acámbaro";
        return view('family.index', compact('families', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * $families->perPage());
    }

    public function showFamilies()
    {
        $families = Family::paginate();
        $title = "Salud Familiar - DIF Acámbaro";
        return view('family.salud-familiar', compact('families', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * $families->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $responsables = ResponsableFamily::all()->pluck('name', 'id')->toArray();
        $title = "Crear Salud Familiar - DIF Acámbaro";
        $family = new Family();
        return view('family.create', compact('family', 'title', 'responsables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Family::$rules);

        $family = Family::create($request->all());

        return redirect()->route('families.index')
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
        $title = "Ver Salud Familiar - DIF Acámbaro";
        $family = Family::find($id);
        return view('family.show', compact('family', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $responsables = ResponsableFamily::all()->pluck('name', 'id')->toArray();
        $title = "Editar Salud Familiar - DIF Acámbaro";
        $family = Family::find($id);
        return view('family.edit', compact('family', 'title', 'responsables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Family $family
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Family $family)
    {
        request()->validate(Family::$rules);

        $family->update($request->all());

        return redirect()->route('families.index')
            ->with('success', 'La información se actualizó correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $family = Family::find($id)->delete();

        return redirect()->route('families.index')
            ->with('success', 'La información se eiliminó correctamente.');
    }
}
