<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Domeki',
            'telefono' => '75054466',
            'informacion' => 'no tiene',
            'email' => 'domeki@gmail.com',
            'password' =>  bcrypt('irascema')
        ]);

        User::create([
            'name' => 'Isai',
            'telefono' => '74522222',
            'informacion' => 'no tiene',
            'email' => 'isai@gmail.com',
            'password' =>  bcrypt('password')
        ]);
    }
}
