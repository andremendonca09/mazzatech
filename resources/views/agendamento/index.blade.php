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
                                        <button type="submit" class="btn btn-danger">Deletar</button>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
