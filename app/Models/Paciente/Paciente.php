<?php

namespace App\Models\Paciente;

use App\Models\Agendamento;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table='paciente';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'cpf',
        'usuario_id',
        'observacao',
    ];

    public function telefone_paciente()
    {
        return $this->hasMany(TelefonePaciente::class);
    }

    public function email_paciente()
    {
        return $this->hasMany(EmailPaciente::class);
    }

    public function agendamento()
    {
        return $this->hasMany(Agendamento::class);
    }
    
}
