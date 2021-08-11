@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Atualizar Paciente</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('paciente.showUpdateForm',$paciente->id) }}">
                        @csrf
                        @method("PUT")
                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome',$paciente->nome) }}" required autocomplete="nome" autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">CPF</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control cpf-mask @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf',$paciente->cpf) }}" required autocomplete="cpf">

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control telefone-mask @error('telefone.0') is-invalid @enderror" name="telefone[]" value="{{ old('telefone.0',(count($paciente->telefone_paciente) ? $paciente->telefone_paciente[0]->descricao : "")) }}">

                                @error('telefone.0')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control telefone-mask @error('telefone.1') is-invalid @enderror" name="telefone[]" value="{{ old('telefone.1',(count($paciente->telefone_paciente) > 1 ? $paciente->telefone_paciente[1]->descricao : "")) }}">

                                @error('telefone.1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',(count($paciente->email_paciente) ? $paciente->email_paciente[0]->descricao : "")) }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="observacao" class="col-md-4 col-form-label text-md-right">Observação</label>

                            <div class="col-md-6">
                                <textarea id="observacao" class="form-control @error('observacao') is-invalid @enderror" name="observacao">{{ old('observacao',$paciente->observacao) }}</textarea>

                                @error('observacao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Atualizar
                                </button>
                                <a href="{!! route('paciente.index') !!}" class="btn btn-secondary">
                                    Pacientes
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
