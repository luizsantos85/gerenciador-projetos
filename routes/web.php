<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded within the "web" middleware group which includes
| sessions, cookie encryption, and more. Go build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Agrupar rotas de clientes
Route::prefix('clients')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('clients.index');
    Route::get('/create', [ClienteController::class, 'create'])->name('clients.create');
    Route::post('/', [ClienteController::class, 'store'])->name('clients.store');
});


