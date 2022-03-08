<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

/**
 * Class ContactController
 * @package App\Http\Controllers
 */
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('can:contacts.index')->only('index');
        $this->middleware('can:contacts.edit')->only('edit', 'update');
        $this->middleware('can:contacts.destroy')->only('destroy');
    }

    public function index()
    {
        $contacts = Contact::paginate(8);
        $title = "Contacto - DIF Acámbaro";
        return view('contact.index', compact('contacts', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * $contacts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact = new Contact();
        $title = "Crear Contacto - DIF Acámbaro";
        return view('contact.create', compact('contact', 'title'));
    }

    public function showContact()
    {
        $contact = new Contact();
        $title = "Contacto - DIF Acámbaro";
        return view('contact.contacto', compact('contact', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Contact::$rules);

        $contact = Contact::create($request->all());

        return redirect('/contacto')
            ->with('success', '¡Se ha enviado el mensaje con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        $title = "Ver Contacto - DIF Acámbaro";
        return view('contact.show', compact('contact', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        $title = "Editar Contacto - DIF Acámbaro";
        return view('contact.edit', compact('contact', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        request()->validate(Contact::$rules);

        $contact->update($request->all());

        return redirect()->route('contacts.index')
            ->with('success', 'Contact updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $contact = Contact::find($id)->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contact deleted successfully');
    }
}
