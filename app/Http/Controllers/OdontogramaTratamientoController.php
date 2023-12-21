<?php

namespace App\Http\Controllers;

use App\Models\OdontogramaTratamiento;
use Illuminate\Http\Request;

class OdontogramaTratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(OdontogramaTratamiento $odontogramaTratamiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OdontogramaTratamiento $odontogramaTratamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OdontogramaTratamiento $odontogramaTratamiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OdontogramaTratamiento $odontogramaTratamiento)
    {
        //
    }
    public function getOdontogramaTratamiento($id){
        $odontogramaTratamiento = OdontogramaTratamiento::find($id);
        return  response()->json($odontogramaTratamiento);
    }
}
