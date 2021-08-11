<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituacaoUsuario extends Model
{
    use HasFactory;

    protected $table='situacao_usuario';

    public $timestamps = false;
    
    const ATIVO = 1;
    const INATIVO = 2;
}
