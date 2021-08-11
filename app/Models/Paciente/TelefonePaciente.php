<?php

namespace App\Models\Paciente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefonePaciente extends Model
{
    use HasFactory;

    protected $table='telefone_paciente';
    
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
