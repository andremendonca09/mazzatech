@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu Principal</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center">
                            <a href="{{route('usuario.index')}}" class="btn btn-secondary btn-lg col-md-12 btn-home">
                                Usuários
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center">
                            <a href="{{route('medico.index')}}" class="btn btn-secondary btn-lg col-md-12 btn-home">
                                Médicos
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center">
                            <a href="{{route('agendamento.index')}}" class="btn btn-secondary btn-lg col-md-12 btn-home">
                                Agendamentos
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center">
                            <a href="{{route('paciente.index')}}" class="btn btn-secondary btn-lg col-md-12 btn-home">
                                Pacientes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
