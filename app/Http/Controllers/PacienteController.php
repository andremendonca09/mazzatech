<?php

namespace App\Http\Controllers;

use App\Models\Paciente\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::select('id', 'nome', 'cpf', 'observacao')->get();
        $pacientes->load(['telefone_paciente', 'email_paciente']);

        return view('paciente.index', compact('pacientes'));
    }

    public function showStoreForm()
    {
        return view('paciente.store');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nome' => 'required|min:2|max:255',
            'cpf' => 'required|min:5|max:20|unique:paciente,cpf',
            'telefone.*' => 'nullable|min:11|max:20',
            'email' => 'nullable|email',
        ]);

        DB::beginTransaction();

        $paciente = Paciente::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'observacao' => $request->observacao,
            'usuario_id' => auth()->id(),
        ]);

        $telefones = array_reduce(array_unique($request->telefone), [$this, 'getTelefonesHigienizados'],[]);

        if(count($telefones))
            $paciente->telefone_paciente()->createMany($telefones);

        if($request->email)
            $paciente->email_paciente()->create(['descricao' => $request->email]);

        DB::commit();

        return redirect()->route('paciente.index')->with('success', 'Paciente criado com sucesso!');
    }

    public function showUpdateForm(Paciente $paciente)
    {
        return view('paciente.update', compact('paciente'));
    }

    public function update(Paciente $paciente,Request $request)
    {
        $this->validate($request,[
            'nome' => 'required|min:2|max:255',
            'cpf' => "required|min:5|max:20|unique:paciente,cpf,$paciente->id",
            'telefone.*' => 'nullable|min:11|max:20',
            'email' => 'nullable|email',
        ]);

        DB::beginTransaction();

        $paciente->update([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'observacao' => $request->observacao,
            'usuario_id' => auth()->id(),
        ]);

        $paciente->telefone_paciente()->delete();
        $paciente->email_paciente()->delete();

        $telefones = array_reduce(array_unique($request->telefone), [$this, 'getTelefonesHigienizados'],[]);

        if(count($telefones))
            $paciente->telefone_paciente()->createMany($telefones);

        if($request->email)
            $paciente->email_paciente()->create(['descricao' => $request->email]);

        DB::commit();

        return redirect()->route('paciente.index')->with('success', 'Paciente criado com sucesso!');
    }

    /**
     * Implementacao de array reduce para a conformacao dos numeros de telefones
     */
    private function getTelefonesHigienizados($carry,$telefone)
    {
        if(!empty($telefone))
            $carry[] = ['descricao' => $telefone];
        return $carry;
    }
}
