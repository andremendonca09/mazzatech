<?php

namespace App\Models;

use App\Models\Paciente\Paciente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamento';

    protected $fillable = [
        'data',
        'medico_id',
        'paciente_id',
        'usuario_id',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function getDiaBrAttribute($value)
    {
        if(empty($this->data))
            return $this->data;
        return date_create($this->data)->format('d/m/Y');
    }

    public function getHorarioAttribute($value)
    {
        if(empty($this->data))
            return $this->data;
        return date_create($this->data)->format('H:i');
    }
}
