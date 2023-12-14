<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UsuarioRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'rol' => 'required'
        ]);

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();

            $user_rol = new UsuarioRole();
            $user_rol->user_id = $user->id;
            $user_rol->rol_id = $request->rol;
            $user_rol->save();
            return redirect()->route('usuarios.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user_rol = UsuarioRole::find($id);
            $user_rol->delete();
            User::destroy($id);
            return redirect()->route('usuarios.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view('usuarios.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'rol' => 'required'
        ]);

        try {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->update();

            $user_rol = UsuarioRole::where('user_id', $id)->get()->first();
            if (!isset($user_rol)) {
                $user_rol = new UsuarioRole();
                $user_rol->user_id = $id;
                $user_rol->rol_id = $request->rol;
                $user_rol->save();
            }
            $user_rol->rol_id = $request->rol;
            $user_rol->update();
            return redirect()->route('usuarios.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {

        try {
            $user_rol = UsuarioRole::find($id);
            $user_rol->delete();
            User::destroy($id);
            return redirect()->route('usuarios.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
