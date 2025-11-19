<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\VerServicos;
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

// Route::get('home', [SiteController::class, 'home']);
// Route::get('contato', [SiteController::class, 'contato']);
// Route::get('sobre', [SiteController::class, 'sobre']);
// Route::get('servico/{codigo?}', VerServicos::class);

Route::get('clientes', [ClienteController::class, 'index']);
Route::get('clientes/create', [ClienteController::class, 'create']);
Route::post('clientes', [ClienteController::class, 'store']);