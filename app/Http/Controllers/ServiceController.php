<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Type;
use App\Models\Modality;
use Illuminate\Http\Request;

/**
 * Class ServiceController
 * @package App\Http\Controllers
 */
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('can:services.index')->only('index');
        $this->middleware('can:services.edit')->only('edit', 'update');
        $this->middleware('can:services.create')->only('create', 'store');
        $this->middleware('can:services.destroy')->only('destroy');
    }

    public function index()
    {
        $services = Service::paginate(8);
        $title = "Servicios - DIF Acámbaro";
        return view('service.index', compact('services', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * $services->perPage());
    }

    public function showService(){
        $services = Service::paginate();
        $title = "Servicios - DIF Acámbaro";
        return view('service.servicios', compact('services', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * $services->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all()->pluck('type', 'id')->toArray();
        $modalities = Modality::all()->pluck('modality', 'id')->toArray();
        $service = new Service();
        $title = "Crear Servicio - DIF Acámbaro";
        return view('service.create', compact('service', 'title', 'types', 'modalities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Service::$rules);

        $service = $request->all();
        if ($image = $request->file('url')) {
            $imageDestinationPath = 'uploads/services';
            $serviceImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $serviceImage);
            $service['url'] = "$serviceImage";
        }

        Service::create($service);

        return redirect()->route('services.index')
            ->with('success', 'El servicio se creó correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        $title = "Ver Servicio - DIF Acámbaro";
        return view('service.show', compact('service', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::all()->pluck('type', 'id')->toArray();
        $modalities = Modality::all()->pluck('modality', 'id')->toArray();
        $service = Service::find($id);
        $title = "Editar Servicio - DIF Acámbaro";
        return view('service.edit', compact('service', 'title', 'types', 'modalities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        request()->validate(Service::$rules);

        $input = $request->all();
        if ($image = $request->file('url')) {
            $imageDestinationPath = 'uploads/services';
            $serviceImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $serviceImage);
            $input['url'] = "$serviceImage";
        }else{
            unset($input['url']);
        }
        $service->update($input);

        return redirect()->route('services.index')
            ->with('success', 'El servicio se actualizó correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $service = Service::find($id)->delete();

        return redirect()->route('services.index')
            ->with('success', 'El servicio se eliminó correctamente.');
    }
}
