<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Cita;
use App\Models\User;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::join('usuario_roles', 'usuario_roles.user_id', 'users.id')
        ->join('roles', 'roles.id', 'usuario_roles.rol_id')
        ->where('roles.rol', 'Odontologo')->get(['users.id as id', 'name', 'email']);
        return view('agendas.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $odontologo = User::find($id);
        $citas = Cita::where('odontologo', $id)->get(['id', 'fecha as start', 'motivo as title']);
        return view('agendas.show', compact('citas', 'odontologo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        //
    }
}
