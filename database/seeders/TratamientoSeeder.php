<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TratamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tratamientos')->insert([
            [
                'nombre' => "corona adaptada",
                'descripcion' => "descripcion",
                "estado" => "realizado"
            ],
            [
                'nombre' => "diente extraido",
                'descripcion' => "descripcion",
                "estado" => "realizado"
            ],
            [
                'nombre' => "diente no erupcionado",
                'descripcion' => "descripcion",
                "estado" => "realizado"
            ],
            [
                'nombre' => "diente opturado",
                'descripcion' => "descripcion",
                "estado" => "realizado"
            ],
            [
                'nombre' => "edentula",
                'descripcion' => "descripcion",
                "estado" => "realizado"
            ],
            [
                'nombre' => "endodontico",
                'descripcion' => "descripcion",
                "estado" => "realizado"
            ],
            [
                'nombre' => "sellante existente",
                'descripcion' => "descripcion",
                "estado" => "realizado"
            ],
            [
                'nombre' => "caries dental",
                'descripcion' => "descripcion",
                "estado" => "por realizar"
            ],
             [
                'nombre' => "corona desadaptada",
                'descripcion' => "descripcion",
                "estado" => "por realizar"
            ],
            [
                'nombre' => "diente por extraer",
                'descripcion' => "descripcion",
                "estado" => "por realizar"
            ],
            [
                'nombre' => "endodoncia",
                'descripcion' => "descripcion",
                "estado" => "por realizar"
            ],
            [
                'nombre' => "sellante indicado",
                'descripcion' => "descripcion",
                "estado" => "por realizar"
            ],
        ]);
    }
}
