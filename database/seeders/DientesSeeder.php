<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dientes')->insert([
            [
                'numero_diente' => 1,
                'nombre_diente' => 'Incisivo central superior derecho',
                'cuadrante' => 2,
                'nombre_cuadrante' => 'superior derecho',
            ],
            [
                'numero_diente' => 2,
                'nombre_diente' => 'Incisivo central superior izquierdo',
                'cuadrante' => 1,
                'nombre_cuadrante' => 'superior izquierdo',
            ],
            [
                'numero_diente' => 3,
                'nombre_diente' => 'Incisivo lateral superior derecho',
                'cuadrante' => 2,
                'nombre_cuadrante' => 'superior derecho',
            ],
            [
                'numero_diente' => 4,
                'nombre_diente' => 'Incisivo lateral superior izquierdo',
                'cuadrante' => 1,
                'nombre_cuadrante' => 'superior izquierdo',
            ],
            [
                'numero_diente' => 5,
                'nombre_diente' => 'Canino superior derecho',
                'cuadrante' => 2,
                'nombre_cuadrante' => 'superior derecho',
            ],
            [
                'numero_diente' => 6,
                'nombre_diente' => 'Canino superior izquierdo',
                'cuadrante' => 1,
                'nombre_cuadrante' => 'superior izquierdo',
            ],
            [
                'numero_diente' => 7,
                'nombre_diente' => 'Primer premolar superior derecho',
                'cuadrante' => 2,
                'nombre_cuadrante' => 'superior derecho',
            ],
            [
                'numero_diente' => 8,
                'nombre_diente' => 'Primer premolar superior izquierdo',
                'cuadrante' => 1,
                'nombre_cuadrante' => 'superior izquierdo',
            ],
            [
                'numero_diente' => 9,
                'nombre_diente' => 'Segundo premolar superior derecho',
                'cuadrante' => 2,
                'nombre_cuadrante' => 'superior derecho',
            ],
            [
                'numero_diente' => 10,
                'nombre_diente' => ' Segundo premolar superior izquierdo',
                'cuadrante' => 1,
                'nombre_cuadrante' => 'superior izquierdo',
            ],
            [
                'numero_diente' => 11,
                'nombre_diente' => 'Primer molar superior derecho',
                'cuadrante' => 2,
                'nombre_cuadrante' => 'superior derecho',
            ],
            [
                'numero_diente' => 12,
                'nombre_diente' => 'Primer molar superior izquierdo',
                'cuadrante' => 1,
                'nombre_cuadrante' => 'superior izquierdo',
            ],
            [
                'numero_diente' => 13,
                'nombre_diente' => 'Segundo molar superior derecho',
                'cuadrante' => 2,
                'nombre_cuadrante' => 'superior derecho',
            ],
            [
                'numero_diente' => 14,
                'nombre_diente' => 'Segundo molar superior izquierdo',
                'cuadrante' => 1,
                'nombre_cuadrante' => 'superior izquierdo',
            ],
            [
                'numero_diente' => 15,
                'nombre_diente' => 'Tercer molar superior derecho',
                'cuadrante' => 2,
                'nombre_cuadrante' => 'superior derecho',
            ],
            [
                'numero_diente' => 16,
                'nombre_diente' => 'Tercer molar superior izquierdo',
                'cuadrante' => 1,
                'nombre_cuadrante' => 'inferior izquierdosuperior izquierdo',
            ],
            [
                'numero_diente' => 17,
                'nombre_diente' => 'Incisivo central inferior derecho',
                'cuadrante' => 4,
                'nombre_cuadrante' => 'inferior derecho',
            ],
            [
                'numero_diente' => 18,
                'nombre_diente' => 'Incisivo central inferior izquierdo',
                'cuadrante' => 3,
                'nombre_cuadrante' => 'inferior izquierdo',
            ],
            [
                'numero_diente' => 19,
                'nombre_diente' => 'Incisivo lateral inferior derecho',
                'cuadrante' => 4,
                'nombre_cuadrante' => 'inferior derecho',
            ],
            [
                'numero_diente' => 20,
                'nombre_diente' => 'Incisivo lateral inferior izquierdo',
                'cuadrante' => 3,
                'nombre_cuadrante' => 'inferior izquierdo',
            ],
            [
                'numero_diente' => 21,
                'nombre_diente' => 'Canino inferior derecho',
                'cuadrante' => 4,
                'nombre_cuadrante' => 'inferior derecho',
            ],
            [
                'numero_diente' => 22,
                'nombre_diente' => 'Canino inferior izquierdo',
                'cuadrante' => 3,
                'nombre_cuadrante' => 'inferior izquierdo',
            ],
            [
                'numero_diente' => 23,
                'nombre_diente' => 'Primer premolar inferior derecho',
                'cuadrante' => 4,
                'nombre_cuadrante' => 'inferior derecho',
            ],
            [
                'numero_diente' => 24,
                'nombre_diente' => 'Primer premolar inferior izquierdo',
                'cuadrante' => 3,
                'nombre_cuadrante' => 'inferior izquierdo',
            ],
            [
                'numero_diente' => 25,
                'nombre_diente' => 'Segundo premolar inferior derecho',
                'cuadrante' => 4,
                'nombre_cuadrante' => 'inferior derecho',
            ],
            [
                'numero_diente' => 26,
                'nombre_diente' => 'Segundo premolar inferior izquierdo',
                'cuadrante' => 3,
                'nombre_cuadrante' => 'inferior izquierdo',
            ],
            [
                'numero_diente' => 27,
                'nombre_diente' => 'Primer molar inferior derecho',
                'cuadrante' => 4,
                'nombre_cuadrante' => 'inferior derecho',
            ],
            [
                'numero_diente' => 28,
                'nombre_diente' => 'Primer molar inferior izquierdo',
                'cuadrante' => 3,
                'nombre_cuadrante' => 'inferior izquierdo',
            ],
            [
                'numero_diente' => 29,
                'nombre_diente' => 'Segundo molar inferior derecho',
                'cuadrante' => 4,
                'nombre_cuadrante' => 'inferior derecho',
            ],
            [
                'numero_diente' => 30,
                'nombre_diente' => 'Segundo molar inferior izquierdo',
                'cuadrante' => 3,
                'nombre_cuadrante' => 'inferior izquierdo',
            ],
            [
                'numero_diente' => 31,
                'nombre_diente' => 'Tercer molar inferior derecho',
                'cuadrante' => 4,
                'nombre_cuadrante' => 'inferior derecho',
            ],
            [
                'numero_diente' => 32,
                'nombre_diente' => 'Tercer molar inferior izquierdo',
                'cuadrante' => 3,
                'nombre_cuadrante' => 'inferior izquierdo',
            ],
        ]);
    }
}
