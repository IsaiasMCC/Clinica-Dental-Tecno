<?php

namespace App\Http\Controllers;

use App\Models\TipoTratamiento;
use Illuminate\Http\Request;

class TipoTratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipotratamientos = TipoTratamiento::all();
        return view('tipotratamientos.index', compact('tipotratamientos'));
    }

    public function create()
    {
        return view('tipotratamientos.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'cost' => 'required'
        ]);
        try {
            $tipotratamiento = new TipoTratamiento();
            $tipotratamiento->nombre = $request->name;
            $tipotratamiento->costo = $request->cost;
            $tipotratamiento->save();
            return redirect()->route('tipotratamientos.index');
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
            $tipotratamiento = TipoTratamiento::find($id);
            $tipotratamiento->delete();
            return redirect()->route('tipotratamientos.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(string $id)
    {
        $tipotratamiento = TipoTratamiento::find($id);
        return view('tipotratamientos.edit', compact('tipotratamiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validate = $request->validate([
            'name' => 'required',
            'cost' => 'required'
        ]);
        try {
            $tipotratamiento = TipoTratamiento::find($id);
            $tipotratamiento->nombre = $request->name;
            $tipotratamiento->costo = $request->cost;
            $tipotratamiento->update();
            return redirect()->route('tipotratamientos.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
