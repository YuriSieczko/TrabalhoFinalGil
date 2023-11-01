<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('templates.main')->with('titulo', "");
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('ativos', 'AtivoController')->middleware(['auth']);
Route::resource('carteiras', 'CarteiraController')->middleware(['auth']);
Route::resource('eventosCorporativos', 'EventosCorporativosController')->middleware(['auth']);
Route::resource('perfil', 'PerfilController')->middleware(['auth']);
Route::resource('operacoes', 'OperacoesController')->middleware(['auth']);


Route::get('/testfacade', function () {
    return App\Facades\UserPermissionsFacade::test();
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

require __DIR__ . '/auth.php';