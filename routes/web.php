<?php
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('studenti.index');
});


Route::get('/studenti', [StudentController::class, 'index'])
    ->name('studenti.index');

Route::get('/studenti/create', [StudentController::class, 'create'])
    ->name('studenti.create');

Route::post('/studenti', [StudentController::class, 'store'])
    ->name('studenti.store');