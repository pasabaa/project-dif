<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

/**
 * Class TypeController
 * @package App\Http\Controllers
 */
class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('can:types.index')->only('index');
        $this->middleware('can:types.edit')->only('edit', 'update');
        $this->middleware('can:types.create')->only('create', 'store');
        $this->middleware('can:types.destroy')->only('destroy');
    }

    public function index()
    {
        $types = Type::paginate(8);
        $title = "Tipos de Servicio - DIF Acámbaro";
        return view('type.index', compact('types', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * $types->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = new Type();
        $title = "Crear Tipo - DIF Acámbaro";
        return view('type.create', compact('type', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Type::$rules);

        $type = Type::create($request->all());

        return redirect()->route('types.index')
            ->with('success', 'El tipo de servicio se creó correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Type::find($id);
        $title = "Ver Tipo - DIF Acámbaro";
        return view('type.show', compact('type', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::find($id);
        $title = "Editar Tipo - DIF Acámbaro";
        return view('type.edit', compact('type', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        request()->validate(Type::$rules);

        $type->update($request->all());

        return redirect()->route('types.index')
            ->with('success', 'El tipo de servicio se actualizó correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $type = Type::find($id)->delete();

        return redirect()->route('types.index')
            ->with('success', 'El tipo de servicio se eliminó correctamente.');
    }
}
