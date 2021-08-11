@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de Pacientes</div>

                <div class="card-body">
                    <table style="width:100%" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="th">ID</th>
                                <th class="th">Nome</th>
                                <th class="th">CPF</th>
                                <th class="th">Telefones</th>
                                <th class="th">E-mails</th>
                                <th class="th">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pacientes as $paciente)
                            <tr>
                                <td>{{$paciente->id}}</td>
                                <td>{{$paciente->nome}}</td>
                                <td>{{$paciente->cpf}}</td>
                                <td>{{implode(', ',$paciente->telefone_paciente->pluck('descricao')->toArray())}}</td>
                                <td>{{implode(', ',$paciente->email_paciente->pluck('descricao')->toArray())}}</td>
                                <td>
                                    <a href="{!! route('paciente.showUpdateForm',[$paciente->id]) !!}" class="btn btn-sm btn-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                    </a>
                                    <a title="Agendar" href="{!! route('agendamento.showStoreForm',[$paciente->id]) !!}" class="btn btn-sm btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr> 
                            @empty
                            <tr>
                                <td colspan="6">Nenhum registro encontrado!</td>
                            </tr>
                            @endforelse 
                        </tbody>
                    </table>
                    <div class="row mb-0">
                        <div class="col-md-12 text-center">
                            <a href="{!! route('paciente.showStoreForm') !!}" class="btn btn-primary">
                                Novo
                            </a>
                            <a href="{!! route('home') !!}" class="btn btn-secondary">
                                Menu Principal
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
