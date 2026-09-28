<?php

use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;

Route::get('/tugas', [TugasController::class, 'apiIndex']);