<?php

namespace App\Http\Controllers;

use App\Models\DetalleOdontograma;
use App\Models\Diente;
use App\Models\Odontograma;
use App\Models\OdontogramaTratamiento;
use App\Models\Tratamiento;
use App\Models\User;
use Illuminate\Http\Request;

class OdontogramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::join('usuario_roles', 'users.id', '=', 'usuario_roles.user_id')
            ->where('usuario_roles.rol_id', 1)
            ->with('roles')
            ->with('roles.role')
            ->get();
        return view('odontograma.index', compact('users'));
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
        $odontograma = Odontograma::create([
            'fecha' => date("Y-m-d"),
            'estado' => 0,
            'user_id' => $request->usuario_id,
            'descripcion_tratamiento' => "Tratamiento inicial",
        ]);

        foreach ($request->odontogramas as $key => $odont) {
            $diente = Diente::where('numero_diente', $odont['numero_diente'])->first();
            $detalle = new DetalleOdontograma();
            $detalle->diente_id = $diente->id;
            $detalle->odontograma_id = $odontograma->id;
            $detalle->odontograma_tratamiento_id = $odont['odontograma_tratamiento_id'];
            $detalle->save();
        }
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Odontograma $odontograma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Odontograma $odontograma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Odontograma $odontograma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Odontograma $odontograma)
    {
        //
    }
    public function odontogramas($id)
    {
        $usuario = User::find($id);
        $dientes = Diente::all();
        $tratamientos_realizados = OdontogramaTratamiento::where('estado', 'realizado')->get();
        $tratamientos_por_realizar = OdontogramaTratamiento::where('estado', 'por realizar')->get();

        return view('odontograma.odontograma', compact('dientes', 'tratamientos_realizados', 'tratamientos_por_realizar', 'usuario'));
    }
    public function getOdontogramas($id){
        $odontogramas = Odontograma::where('user_id', $id)->get();
        // return response()->json($odontogramas);
        return view('odontograma.getOdontogramas', compact('odontogramas'));
    }
    public function getDetalleOdontograma($id){
        $detalle_odontograma = DetalleOdontograma::where('odontograma_id', $id)->get();
        return view('odontograma.detalleOdontograma', compact('detalle_odontograma'));
    }
}
