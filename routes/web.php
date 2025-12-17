<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
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
    Route::get('/{client}/edit', [ClienteController::class, 'edit'])->name('clients.edit');
    Route::put('/{client}', [ClienteController::class, 'update'])->name('clients.update');
    Route::delete('/{client}', [ClienteController::class, 'destroy'])->name('clients.destroy');
});

Route::resource('employees', EmployeeController::class);


