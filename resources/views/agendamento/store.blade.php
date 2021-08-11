@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agendar</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('agendamento.showStoreForm',$paciente->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Paciente</label>
                            <div class="col-md-6" >
                                <input class="form-control" value="{{ $paciente->nome }}" disabled>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="situacao-medico-id" class="col-md-4 col-form-label text-md-right">Médico</label>

                            <div class="col-md-6">
                                <select id="medico-id" class="form-control @error('medico_id') is-invalid @enderror" name="medico_id" required>
                                @foreach($medicos as $medico)
                                <option value="{{$medico->id}}"{{(old('medico_id')==$medico->id ? " selected":"")}}>{{$medico->nome}}</option>
                                @endforeach
                                </select>
                                @error('medico_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dia" class="col-md-4 col-form-label text-md-right">Dia</label>

                            <div class="col-md-6">
                                <input id="dia" type="date" class="form-control @error('dia') is-invalid @enderror" name="dia" value="{{ old('dia') }}" required>

                                @error('dia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="horario" class="col-md-4 col-form-label text-md-right">Horario</label>

                            <div class="col-md-6">
                                <input id="horario" type="text" class="form-control @error('horario') is-invalid @enderror" name="horario" value="{{ old('horario') }}" required>

                                @error('horario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                                <a href="{!! route('medico.index') !!}" class="btn btn-secondary">
                                    Médicos
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
