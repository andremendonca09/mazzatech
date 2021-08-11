@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de Usuários</div>

                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="th">ID</th>
                                <th class="th">Nome</th>
                                <th class="th">Login</th>
                                <th class="th">Situação</th>
                                <th class="th">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->id}}</td>
                                <td>{{$usuario->nome}}</td>
                                <td>{{$usuario->login}}</td>
                                <td>{{$usuario->situacao_usuario->descricao}}</td>
                                <td><a href="{!! route('usuario.showUpdateForm',[$usuario->id]) !!}" class="btn btn-warning">Editar</a></td>
                            </tr>  
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row mb-0">
                        <div class="col-md-12 text-center">
                            <a href="{!! route('usuario.showStoreForm') !!}" class="btn btn-primary">
                                Novo
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
