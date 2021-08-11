<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Medico;
use App\Models\Paciente\Paciente;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function index(Request $request)
    {
        $agendamentos = Agendamento::all();
        return view('agendamento.index', compact('agendamentos'));
        // $medicos = Medico::select('id','nome')->get();
        // $pacientes = Paciente::select('id','nome')->get();
        // return view('agendamento.index', compact('agendamentos', 'medicos', 'pacientes'));
    }

    public function showStoreForm(Paciente $paciente)
    {   
        $medicos = Medico::select('id','nome')->get();
        return view('agendamento.store', compact('paciente','medicos'));
    }

    public function store(Paciente $paciente,Request $request)
    {   
        $this->validate($request, [
            'dia' => 'required|date|after_or_equal:today',
            'horario' => 'required|date_format:H:i',
            'medico_id' => 'required|exists:medico,id',
        ]);

        $paciente->agendamento()->create([
            'data' => $request->dia . ' ' . $request->horario,
            'medico_id' =>$request->medico_id,
            'usuario_id' => auth()->id(),
        ]);

        return redirect()->route('paciente.index')->with('success', 'Agendamento criado com sucesso!');
    }

    public function delete(Agendamento $agendamento)
    {   
        $agendamento->destroy($agendamento->id);
        return redirect()->route('agendamento.index')->with('success', 'Agendamento deletado com sucesso!');
    }
}
