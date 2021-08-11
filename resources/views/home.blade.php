@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu Principal</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <a href="{{route('usuario.index')}}" class="btn btn-secondary btn-lg col-md-12">
                                Usuários
                            </a>
                        </div>
                        <div class="col-sm-4 text-center">
                            <a href="{{route('medico.index')}}" class="btn btn-secondary btn-lg col-md-12">
                                Médicos
                            </a>
                        </div>
                        <div class="col-sm-4 text-center">
                            <a href="{{route('agendamento.index')}}" class="btn btn-secondary btn-lg col-md-12">
                                Agendamentos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
