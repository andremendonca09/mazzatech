@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar Médico</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('medico.showStoreForm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="crm" class="col-md-4 col-form-label text-md-right">CRM</label>

                            <div class="col-md-6">
                                <input id="crm" type="number" class="form-control crm-mask @error('crm') is-invalid @enderror" name="crm" value="{{ old('crm') }}" required autocomplete="crm">

                                @error('crm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="situacao-medico-id" class="col-md-4 col-form-label text-md-right">Situação</label>

                            <div class="col-md-6">
                                <select id="situacao-medico-id" class="form-control @error('situacao_medico_id') is-invalid @enderror" name="situacao_medico_id" required>
                                @foreach($situacoes as $situacao)
                                <option value="{{$situacao->id}}"{{(old('situacao_medico_id')==$situacao->id ? " selected":"")}}>{{$situacao->descricao}}</option>
                                @endforeach
                                </select>
                                @error('situacao_medico_id')
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
