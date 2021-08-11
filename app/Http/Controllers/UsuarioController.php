<?php

namespace App\Http\Controllers;

use App\Models\SituacaoUsuario;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::select('id', 'nome', 'login', 'situacao_usuario_id')->get();
        $usuarios->load('situacao_usuario');

        return view('usuario.index', compact('usuarios'));
    }

    public function showStoreForm()
    {
        $situacoes = SituacaoUsuario::all();
        return view('usuario.store', compact('situacoes'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nome' => 'required|min:2|max:255',
            'login' => 'required|min:2|max:50|unique:usuario,login',
            'senha' => 'required|min:8|confirmed',
            'situacao_usuario_id'=> 'required|exists:situacao_usuario,id',
        ]);

        Usuario::create([
            'nome' => $request->nome,
            'login' => $request->login,
            'situacao_usuario_id'=> $request->situacao_usuario_id,
            'senha' => Hash::make($request->senha),
        ]);

        return redirect()->route('usuario.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function showUpdateForm(Usuario $usuario)
    {
        $situacoes = SituacaoUsuario::all();

        return view('usuario.update', compact('situacoes','usuario'));
    }

    public function update(Usuario $usuario,Request $request)
    {
        $this->validate($request,[
            'nome' => 'required|min:2|max:255',
            'login' => "required|min:2|max:50|unique:usuario,login,$usuario->id",
            'senha' => 'nullable|min:8|confirmed',
            'situacao_usuario_id'=> 'required|exists:situacao_usuario,id',
        ]);

        $dados = $request->only('nome', 'login', 'situacao_usuario_id');
        if(!empty($request->senha))
            $dados['senha']=Hash::make($request->senha);

        $usuario->fill($dados);

        $usuario->save();

        return redirect()->route('usuario.index')->with('success', 'Usuário criado com sucesso!');
    }
}
