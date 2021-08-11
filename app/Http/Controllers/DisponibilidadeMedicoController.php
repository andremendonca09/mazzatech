<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class DisponibilidadeMedicoController extends Controller
{
    public function show(Medico $medico)
    {
        $diasSemana[0] = $medico->disponibilidade_medico->where('dia_semana',0)->pluck('horario')->toArray();
        $diasSemana[1] = $medico->disponibilidade_medico->where('dia_semana',1)->pluck('horario')->toArray();
        $diasSemana[2] = $medico->disponibilidade_medico->where('dia_semana',2)->pluck('horario')->toArray();
        $diasSemana[3] = $medico->disponibilidade_medico->where('dia_semana',3)->pluck('horario')->toArray();
        $diasSemana[4] = $medico->disponibilidade_medico->where('dia_semana',4)->pluck('horario')->toArray();
        $diasSemana[5] = $medico->disponibilidade_medico->where('dia_semana',5)->pluck('horario')->toArray();
        $diasSemana[6] = $medico->disponibilidade_medico->where('dia_semana',6)->pluck('horario')->toArray();

        $diasSemana = array_map(function($dom,$seg,$ter,$qua,$qui,$sex,$sab){
            return [$dom,$seg,$ter,$qua,$qui,$sex,$sab];
        },$diasSemana[0], $diasSemana[1], $diasSemana[2], $diasSemana[3], $diasSemana[4], $diasSemana[5], $diasSemana[6]);

        return view('disponibilidade-medico.show', compact('medico', 'diasSemana'));
    }

    public function showUpdateForm(Medico $medico,$diaSemana)
    {
        abort_if(!in_array($diaSemana, [0,1,2,3,4,5,6]) , 404);

        $disponibilidades = $medico->disponibilidade_medico->where('dia_semana',$diaSemana)->pluck('horario')->toArray();

        return view('disponibilidade-medico.update', compact('medico', 'diaSemana', 'disponibilidades'));
    }

    public function update(Medico $medico,$diaSemana, Request $request)
    {
        abort_if(!in_array($diaSemana, [0,1,2,3,4,5,6]) , 404);

        $this->validate($request,['horario.*' => 'nullable|date_format:H:i']);

        $medico->disponibilidade_medico()->where('dia_semana',$diaSemana)->delete();

        $horarios = array_filter(array_unique($request->horario));
        sort($horarios);

        $disponibilidade=[];
        foreach($horarios as $horario)
            if($horario)
                $disponibilidade[]=[
                    'dia_semana' => $diaSemana,
                    'horario' => $horario,
                    'medico_id' => $medico->id,
                    'usuario_id' => auth()->id(),
                ];

        if(count($disponibilidade))
            $medico->disponibilidade_medico()->createMany($disponibilidade);

        return redirect()->route('disponibilidade-medico.show', $medico->id)->with('success', 'Disponibilidade atualizada com sucesso!');
    }


}
