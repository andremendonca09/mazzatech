<?php

namespace Database\Seeders;

use App\Models\SituacaoMedico;
use Illuminate\Database\Seeder;

class SituacaoMedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SituacaoMedico::create([
            'id'=>SituacaoMedico::ATIVO,
            'descricao' => 'Ativo',
        ]);
        
        SituacaoMedico::create([
            'id'=>SituacaoMedico::INATIVO,
            'descricao' => 'Inativo',
        ]);
    }
}
