<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.edit')->only('edit', 'update');
        $this->middleware('can:users.create')->only('create', 'store');
        $this->middleware('can:users.destroy')->only('destroy');
    }

    public function index()
    {
        $users = User::paginate(8);
        $title = "Usuarios - DIF Acámbaro";
        return view('user.index', compact('users', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $title = "Usuarios - DIF Acámbaro";
        return view('user.create', compact('user', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $user = User::create([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('users.index')
            ->with('success', 'El usuario se creo correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $title = "Usuarios - DIF Acámbaro";
        return view('user.show', compact('user', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $title = "Usuarios - DIF Acámbaro";
        return view('user.edit', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $user->update([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('users.index')
            ->with('success', 'El usuario se actualizó correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'El usuario se eliminó correctamente');
    }
}
