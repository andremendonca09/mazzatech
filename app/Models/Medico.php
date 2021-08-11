<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medico';

    protected $fillable = [
        'nome',
        'crm',
        'situacao_medico_id',
        'usuario_id',
    ];

    public function situacao_medico()
    {
        return $this->belongsTo(SituacaoMedico::class);
    }

    public function disponibilidade_medico()
    {
        return $this->hasMany(DisponibilidadeMedico::class);
    }
}
