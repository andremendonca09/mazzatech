<?php

namespace App\Models\Paciente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailPaciente extends Model
{
    use HasFactory;

    protected $table='email_paciente';

    public $timestamps = false;

    protected $fillable = [
        'descricao',
        'paciente_id',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
