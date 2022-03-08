<?php

namespace App\Http\Controllers;

use App\Models\Responsible;
use Illuminate\Http\Request;

/**
 * Class ResponsibleController
 * @package App\Http\Controllers
 */
class ResponsibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsibles = Responsible::paginate(5);
        $title = "Responsables - DIF Acámbaro";
        return view('responsible.index', compact('responsibles', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * $responsibles->perPage());
    }

    public function showResponsibles()
    {
        $responsibles = Responsible::paginate();
        $title = "Responsables - DIF Acámbaro";
        return view('responsible.responsables', compact('responsibles', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * $responsibles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $responsible = new Responsible();
        $title = "Crear Responsable - DIF Acámbaro";
        return view('responsible.create', compact('responsible', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Responsible::$rules);

        $responsible = $request->all();
        if ($image = $request->file('url')) {
            $imageDestinationPath = 'uploads/responsibles';
            $responsibleImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $responsibleImage);
            $service['url'] = "$responsibleImage";
        }

        Responsible::create($responsible);

        return redirect()->route('responsibles.index')
            ->with('success', 'Responsable creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $responsible = Responsible::find($id);
        $title = "Mostrar Responsable - DIF Acámbaro";
        return view('responsible.show', compact('responsible', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $responsible = Responsible::find($id);
        $title = "Modificar Responsable - DIF Acámbaro";
        return view('responsible.edit', compact('responsible', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Responsible $responsible
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Responsible $responsible)
    {
        request()->validate(Responsible::$rules);

        $input = $request->all();
        if ($image = $request->file('url')) {
            $imageDestinationPath = 'uploads/responsibles';
            $responsibleImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $responsibleImage);
            $input['url'] = "$responsibleImage";
        }else{
            unset($input['url']);
        }
        $responsible->update($input);

        return redirect()->route('responsibles.index')
            ->with('success', 'Responsable modificado con éxito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $responsible = Responsible::find($id)->delete();

        return redirect()->route('responsibles.index')
            ->with('success', 'Responsable eliminado con éxito.');
    }
}
