<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GestionIncidenciaController;
use App\Http\Controllers\User\AjaxController;
use App\Http\Controllers\User\IncidenciasController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.index');

Route::resource('users', UserController::class)->names('admin.gestionusers');
Route::resource('incidencias', IncidenciasController::class)->names('user');
Route::post('ajax/tipos',[AjaxController::class,'tipo'])->name('ajax.tipo');
Route::resource('gestiontickets', GestionIncidenciaController::class)->only(['index', 'edit', 'update','destroy'])->names('admin.gestiontickets');

