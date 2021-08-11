@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Atualizar Disponibilidades</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('disponibilidade-medico.showUpdateForm', [$medico->id,$diaSemana]) }}">
                        @csrf
                        @method("PUT")

                        @for($i=0;$i<20;$i++)
                        <div class="form-group row">
                            <label for="horario" class="col-md-4 col-form-label text-md-right">Horário</label>

                            <div class="col-md-6">
                                <input id="horario" type="text" class="form-control @error('horario') is-invalid @enderror" name="horario[]" value="{{ old('horario.'.$i, (array_key_exists($i,$disponibilidades) ? $disponibilidades[$i] : "")) }}">

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endfor

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Atualizar
                                </button>
                                <a href="{!! route('disponibilidade-medico.show',$medico->id) !!}" class="btn btn-secondary">
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
