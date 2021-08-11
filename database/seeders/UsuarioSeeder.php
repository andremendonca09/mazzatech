<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'id' =>1,
            'nome' => 'Administrador',
            'login' => 'ADMINISTRADOR',
            'senha' => Hash::make('mazzatech'),
            'situacao_usuario_id'=>1,
        ]);
    }
}
