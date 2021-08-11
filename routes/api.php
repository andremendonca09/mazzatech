<?php

use App\Http\Controllers\MedicoController;
use Illuminate\Support\Facades\Route;


Route::get('/medico', [MedicoController::class, 'listaMedicos']);
