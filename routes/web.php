<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\DisponibilidadeMedicoController;
use App\Http\Controllers\AgendamentoController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index']);


    // Rota de logout...
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Rotas de usuario
    Route::prefix('usuario')->name('usuario.')->group(function () {
        Route::get('/', [UsuarioController::class, 'index'])->name('index');
        Route::get('/cadastrar', [UsuarioController::class, 'showStoreForm'])->name('showStoreForm');
        Route::post('/cadastrar', [UsuarioController::class, 'store']);
        Route::get('/atualizar/{usuario}', [UsuarioController::class, 'showUpdateForm'])->name('showUpdateForm');
        Route::put('/atualizar/{usuario}', [UsuarioController::class, 'update']);
    });

    // Rotas de medico
    Route::prefix('medico')->name('medico.')->group(function () {
        Route::get('/', [MedicoController::class, 'index'])->name('index');
        Route::get('/cadastrar', [MedicoController::class, 'showStoreForm'])->name('showStoreForm');
        Route::post('/cadastrar', [MedicoController::class, 'store']);
        Route::get('/atualizar/{medico}', [MedicoController::class, 'showUpdateForm'])->name('showUpdateForm');
        Route::put('/atualizar/{medico}', [MedicoController::class, 'update']);
    });

    // Rotas de Paciente
    Route::prefix('paciente')->name('paciente.')->group(function () {
        Route::get('/', [PacienteController::class, 'index'])->name('index');
        Route::get('/cadastrar', [PacienteController::class, 'showStoreForm'])->name('showStoreForm');
        Route::post('/cadastrar', [PacienteController::class, 'store']);
        Route::get('/atualizar/{paciente}', [PacienteController::class, 'showUpdateForm'])->name('showUpdateForm');
        Route::put('/atualizar/{paciente}', [PacienteController::class, 'update']);
    });

    // Essa funcionalidade pode nao ser completamente implementada, pois não havera tempo
    Route::prefix('disponibilidade-medico')->name('disponibilidade-medico.')->group(function () {
        Route::get('/show/{medico}', [DisponibilidadeMedicoController::class, 'show'])->name('show');
        Route::get('/atualizar/{medico}/{dia_semana}', [DisponibilidadeMedicoController::class, 'showUpdateForm'])->name('showUpdateForm');
        Route::put('/atualizar/{medico}/{dia_semana}', [DisponibilidadeMedicoController::class, 'update']);
    });

    // Rotas de agenadammento
    Route::prefix('agendamento')->name('agendamento.')->group(function () {
        Route::get('/', [AgendamentoController::class, 'index'])->name('index');
        Route::get('/cadastrar/{paciente}', [AgendamentoController::class, 'showStoreForm'])->name('showStoreForm');
        Route::post('/cadastrar/{paciente}', [AgendamentoController::class, 'store']);
        Route::delete('/deletar/{agendamento}', [AgendamentoController::class, 'delete'])->name('delete');
    });
});

// Rotas de login...
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
