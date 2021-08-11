<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\SituacaoMedico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::select('id', 'nome', 'crm', 'situacao_medico_id')->get();
        $medicos->load('situacao_medico');

        return view('medico.index', compact('medicos'));
    }

    public function showStoreForm()
    {
        $situacoes = SituacaoMedico::all();
        return view('medico.store', compact('situacoes'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nome' => 'required|min:2|max:255',
            'crm' => 'required|min:5|max:50|unique:medico,crm',
            'situacao_medico_id'=> 'required|exists:situacao_medico,id',
        ]);

        Medico::create([
            'nome' => $request->nome,
            'crm' => $request->crm,
            'situacao_medico_id'=> $request->situacao_medico_id,
            'usuario_id' => auth()->id(),
        ]);

        return redirect()->route('medico.index')->with('success', 'Médico criado com sucesso!');
    }

    public function showUpdateForm(Medico $medico)
    {
        $situacoes = SituacaoMedico::all();

        return view('medico.update', compact('situacoes','medico'));
    }

    public function update(Medico $medico,Request $request)
    {
        $this->validate($request,[
            'nome' => 'required|min:2|max:255',
            'crm' => "required|min:5|max:50|unique:medico,crm,$medico->id",
            'situacao_medico_id'=> 'required|exists:situacao_medico,id',
        ]);

        $dados = $request->only('nome', 'login', 'situacao_medico_id');
        $dados['usuario_id'] = auth()->id();

        $medico->fill($dados);

        $medico->save();

        return redirect()->route('medico.index')->with('success', 'Médico criado com sucesso!');
    }
}
