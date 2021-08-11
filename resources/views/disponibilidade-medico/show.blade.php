@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Disponibilidade</div>

                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="th">Domingo</th>
                                <th class="th">Segunda</th>
                                <th class="th">Terça</th>
                                <th class="th">Quarta</th>
                                <th class="th">Quinta</th>
                                <th class="th">Sexta</th>
                                <th class="th">Sabado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diasSemana as $horario)
                            <tr>
                                <td>{{$horario[0]}}</td>
                                <td>{{$horario[1]}}</td>
                                <td>{{$horario[2]}}</td>
                                <td>{{$horario[3]}}</td>
                                <td>{{$horario[4]}}</td>
                                <td>{{$horario[5]}}</td>
                                <td>{{$horario[6]}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tbody>
                            <tr>
                                <th class="th"><a href="{!! route('disponibilidade-medico.showUpdateForm',[$medico->id,0]) !!}" class="btn-sm btn btn-primary">Atualizar</a></th>
                                <th class="th"><a href="{!! route('disponibilidade-medico.showUpdateForm',[$medico->id,1]) !!}" class="btn-sm btn btn-primary">Atualizar</a></th>
                                <th class="th"><a href="{!! route('disponibilidade-medico.showUpdateForm',[$medico->id,2]) !!}" class="btn-sm btn btn-primary">Atualizar</a></th>
                                <th class="th"><a href="{!! route('disponibilidade-medico.showUpdateForm',[$medico->id,3]) !!}" class="btn-sm btn btn-primary">Atualizar</a></th>
                                <th class="th"><a href="{!! route('disponibilidade-medico.showUpdateForm',[$medico->id,4]) !!}" class="btn-sm btn btn-primary">Atualizar</a></th>
                                <th class="th"><a href="{!! route('disponibilidade-medico.showUpdateForm',[$medico->id,5]) !!}" class="btn-sm btn btn-primary">Atualizar</a></th>
                                <th class="th"><a href="{!! route('disponibilidade-medico.showUpdateForm',[$medico->id,6]) !!}" class="btn-sm btn btn-primary">Atualizar</a></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
