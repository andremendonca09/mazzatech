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
                        {{-- <tbody>
                            @forelse ($pacientes as $paciente)
                            <tr>
                                <td>{{$paciente->id}}</td>
                                <td>{{$paciente->nome}}</td>
                                <td>{{$paciente->cpf}}</td>
                                <td>{{implode(', ',$paciente->telefone_paciente->pluck('descricao')->toArray())}}</td>
                                <td>{{implode(', ',$paciente->email_paciente->pluck('descricao')->toArray())}}</td>
                                <td>
                                    <a href="{!! route('paciente.showUpdateForm',[$paciente->id]) !!}" class="btn btn-warning">Editar</a>
                                    <a href="{!! route('agendamento.showStoreForm',[$paciente->id]) !!}" class="btn btn-success">Agendar</a>
                                </td>
                            </tr> 
                            @empty
                            <tr>
                                <td colspan="6">Nenhum registro encontrado!</td>
                            </tr>
                            @endforelse 
                        </tbody> --}}
                    </table>
                    <div class="row mb-0">
                        <div class="col-md-12 text-center">
                            <a href="{!! route('paciente.showStoreForm') !!}" class="btn btn-primary">
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
