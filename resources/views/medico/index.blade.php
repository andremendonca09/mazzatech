@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de Médicos</div>

                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="th">ID</th>
                                <th class="th">Nome</th>
                                <th class="th">CRM</th>
                                <th class="th">Situação</th>
                                <th class="th">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($medicos as $medico)
                            <tr>
                                <td>{{$medico->id}}</td>
                                <td>{{$medico->nome}}</td>
                                <td>{{$medico->crm}}</td>
                                <td>{{$medico->situacao_medico->descricao}}</td>
                                <td>
                                    <a href="{!! route('medico.showUpdateForm',[$medico->id]) !!}" class="btn btn-warning">Editar</a>
                                    <a href="{!! route('disponibilidade-medico.show',[$medico->id]) !!}" class="btn btn-warning">Disponibilidade</a>
                                </td>
                            </tr> 
                            @empty
                            <tr>
                                <td colspan="5">Nenhum registro encontrado!</td>
                            </tr>
                            @endforelse 
                        </tbody>
                    </table>
                    <div class="row mb-0">
                        <div class="col-md-12 text-center">
                            <a href="{!! route('medico.showStoreForm') !!}" class="btn btn-primary">
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
