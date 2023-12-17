<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Cita::all();
        return view('citas.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = User::join('usuario_roles', 'usuario_roles.user_id', 'users.id')
            ->join('roles', 'roles.id', 'usuario_roles.rol_id')
            ->where('roles.rol', 'Paciente')->get(['users.id as id', 'name']);
        $odontologos = User::join('usuario_roles', 'usuario_roles.user_id', 'users.id')
            ->join('roles', 'roles.id', 'usuario_roles.rol_id')
            ->where('roles.rol', 'Odontologo')->get(['users.id as id', 'name']);
        return view('citas.create', compact('pacientes', 'odontologos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'date' => 'required',
            'time' => 'required',
            'description' => 'required',
            'paciente' => 'required',
            'odontologo' => 'required'
        ]);

        try {
            $cita = new Cita();
            $cita->fecha = $request->date;
            $cita->hora = $request->time;
            $cita->estado = 0;
            $cita->motivo = $request->description;
            $cita->diagnostico = "";
            $cita->paciente = $request->paciente;
            $cita->odontologo = $request->odontologo;
            $cita->save();
            return redirect()->route('citas.index');
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
            Cita::destroy($id);
            return redirect()->route('citas.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cita = Cita::find($id);
        $paciente = User::find($cita->paciente);
        $odontologos = User::join('usuario_roles', 'usuario_roles.user_id', 'users.id')
            ->join('roles', 'roles.id', 'usuario_roles.rol_id')
            ->where('roles.rol', 'Odontologo')->get(['users.id as id', 'name']);
        return view('citas.edit', compact('odontologos', 'paciente', 'cita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'date' => 'required',
            'time' => 'required',
            'description' => 'required',
            'odontologo' => 'required'
        ]);

        try {
            $cita = Cita::find($id);
            $cita->fecha = $request->date;
            $cita->hora = $request->time;
            $cita->motivo = $request->description;
            $cita->odontologo = $request->odontologo;
            $cita->update();
            return redirect()->route('citas.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        //
    }

    public function historials()
    {
        $citas = Cita::all();
        $pacientes = User::join('usuario_roles', 'usuario_roles.user_id', 'users.id')
            ->join('roles', 'roles.id', 'usuario_roles.rol_id')
            ->where('roles.rol', 'Paciente')->get(['users.id as id', 'name']);
        return view('historials.index', compact('citas', 'pacientes'));
    }

    public function historialsFilters(Request $request)
    {
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        $paciente = $request->paciente;
        if (isset($paciente)) {
            $citas = Cita::whereBetween('fecha', [$date_start, $date_end])
            ->where('paciente', $request->paciente)
            ->get();
        } else {
            $citas = Cita::whereBetween('fecha', [$date_start, $date_end])->get();
        }
        $pacientes = User::join('usuario_roles', 'usuario_roles.user_id', 'users.id')
            ->join('roles', 'roles.id', 'usuario_roles.rol_id')
            ->where('roles.rol', 'Paciente')->get(['users.id as id', 'name']);
        return view('historials.index', compact('citas', 'pacientes'));
    }
}
