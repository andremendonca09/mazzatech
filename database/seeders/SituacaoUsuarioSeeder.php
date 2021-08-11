<?php

namespace Database\Seeders;

use App\Models\SituacaoUsuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SituacaoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SituacaoUsuario::create([
            'id'=>SituacaoUsuario::ATIVO,
            'descricao' => 'Ativo',
        ]);
        SituacaoUsuario::create([
            'id'=>SituacaoUsuario::INATIVO,
            'descricao' => 'Inativo',
        ]);
    }
}
