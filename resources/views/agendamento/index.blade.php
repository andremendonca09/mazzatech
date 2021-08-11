@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de Agendamentos</div>

                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="th">Data</th>
                                <th class="th">Horario</th>
                                <th class="th">Médico</th>
                                <th class="th">Paciente</th>
                                <th class="th">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($agendamentos as $agendamento)
                            <tr>
                                <td>{{$agendamento->diaBr}}</td>
                                <td>{{$agendamento->horario}}</td>
                                <td>{{$agendamento->medico->nome}}</td>
                                <td>{{$agendamento->paciente->nome}}</td>
                                <td>
                                    <form action={{route('agendamento.delete',$agendamento->id)}} method="post">
                                        @csrf
                                        @method("delete")
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </button>
                                    </form>
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
                            <a href="{!! route('paciente.index') !!}" class="btn btn-primary">
                                Paciente
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
