<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisponibilidadeMedico extends Model
{
    use HasFactory;

    protected $table = 'disponibilidade_medico';

    protected $fillable = [
        'dia_semana',
        'medico_id',
        'horario',
        'usuario_id',
    ];

    public function getHorarioAttribute($value)
    {
        if(empty($value))
            return $value;
        return date_create_from_format('H:i:s', $value)->format('H:i');
    }
}
