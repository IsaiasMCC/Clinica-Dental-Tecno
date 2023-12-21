<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\DetalleReceta;
use App\Models\Medicamento;
use App\Models\Receta;
use App\Models\TipoTratamiento;
use App\Models\Tratamiento;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tratamientos = Tratamiento::all();
        return view('tratamientos.index', compact('tratamientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $citas = Cita::all();
        $tipotratamientos = TipoTratamiento::all();
        $medicamentos = Medicamento::all();
        return view('tratamientos.create', compact('citas', 'tipotratamientos', 'medicamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'date' => 'required',
            'description' => 'required',
            'tipotratamiento' => 'required',
            'cita' => 'required'
        ]);

        try {
            $tratamiento = new Tratamiento();
            $tratamiento->fecha = $request->date;
            $tratamiento->estado = 0;
            $tratamiento->descripcion = $request->description;
            $tratamiento->tipo_tratamiento_id = $request->tipotratamiento;
            $tratamiento->cita_id = $request->cita;
            $tratamiento->save();

            //resetas
            $receta = new Receta();
            $receta->fecha = $tratamiento->fecha;
            $receta->tratamiento_id = $tratamiento->id;
            $receta->save();
            $productos = Session::get('productos', []);
            foreach ($productos as $clave => $producto) {
                // dd($producto);
                $detalle = new DetalleReceta();
                $detalle->indicaciones = "";
                $detalle->cantidad = $producto['cantidad'];
                $detalle->subtotal = $producto['subtotal'];
                $detalle->receta_id = $receta->id;
                $detalle->medicamento_id = $clave;
                $detalle->save();
            }
            Session::forget('productos');
            return redirect()->route('tratamientos.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Tratamiento::destroy($id);
        return redirect()->route('tratamientos.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tratamiento = Tratamiento::find($id);
        return view('tratamientos.edit', compact('tratamiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate(['estado' => 'required']);
        $tratamiento = Tratamiento::find($id);
        $tratamiento->estado = $request->estado;
        $tratamiento->update();
        return redirect()->route('tratamientos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tratamiento $tratamiento)
    {
        //
    }

    public function agregarMedicamento(Request $request)
    {
        $productoId = $request->get('medicamento');
        $cantidad = $request->get('count');

        // Obtener la lista actual de productos de la sesión
        $productos = session('productos', []);

        // Verificar si el producto ya existe en la lista
        if (array_key_exists($productoId, $productos)) {
            // Si el producto ya existe, actualiza la cantidad
            $productos[$productoId]['cantidad'] = $cantidad;
            $productos[$productoId]['subtotal'] = $cantidad * $productos[$productoId]['precio'];
        } else {
            // Si el producto no existe, agrega un nuevo elemento a la lista
            // Utiliza el ID del producto como clave y guarda un objeto con nombre y cantidad
            $medicamento = Medicamento::find($productoId);
            $productos[$productoId] = [
                'id' => $productoId,
                'nombre' => "$medicamento->nombre",  // Aquí deberías obtener el nombre desde la base de datos
                'precio' => $medicamento->cantidad,
                'cantidad' => $cantidad,
                'subtotal' =>  $medicamento->cantidad * $cantidad,
            ];
        }

        // Guardar la lista actualizada en la sesión
        session(['productos' => $productos]);

        // Devuelve la lista actualizada en formato JSON
        return response()->json(['productos' => $productos]);
    }

    public function getMedicamento($id) {

    }

}
