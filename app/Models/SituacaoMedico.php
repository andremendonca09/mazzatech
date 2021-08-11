<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituacaoMedico extends Model
{
    use HasFactory;
    //As situacoes estao em tabelas diferentes, pois podem se tornarem diferentes futuramente

    protected $table='situacao_medico';

    public $timestamps = false;
    
    const ATIVO = 1;
    const INATIVO = 2;
}
