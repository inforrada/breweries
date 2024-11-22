<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WineController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

// la ruta Home la crea Fortify y aplica el middleware de Auth
Route::get('/home', function () {
    return redirect()->route('index');
}
)->name('home');

Route::get('/livewire', function () {
    $count = session ('counter', 0);
    return view ('prueba', compact('count'));
})->name('paginadepruebas');

Route::post('/livewire', function () {
    $count = session ('counter', 0);
    $count++;
    session(['counter' => $count]);

    return view ('prueba', compact('count'));
})->name('paginadepruebas');
/*
Route::get('/fadfadfasdfasfdsad/{numero}/{name}', function ($name = 'David', $numero = 2023) {

    return view ('home', ["nombre" => $name, "numero" => $numero]);
})->name('inicio');
*/

Route::get ('/bars/listado', [ BarController::class, 'index' ])->name('bars.index');

Route::group(['middleware' => 'auth'], function () {
        Route::get('/bars/create', [BarController::class, 'create'])->name('bars.create');
        Route::post('/bars/store', [BarController::class, 'store'])->name('bars.store');

        Route::get('/bars/edit/{bar}', [BarController::class, 'edit'])->name('bars.edit');
        Route::post('/bars/update/{bar}', [BarController::class, 'update'])->name('bars.update');

        Route::post('/bars/delete/{bar}', [BarController::class, 'delete'])->name('bars.delete');
    });

Route::get ('/bars/proposals/{user}', [BarController::class, 'proposals'])->name ('bars.proposals');
    
Route::get ('/bars/{bar}', [BarController::class, 'show'])->name('bars.show');
Route::get ('/bar/{name}', [BarController::class, 'friendly'])->name('bars.friendly');

Route::resource('/wine', WineController::class)->parameters(['wines']);


Route::get ('/contacto', [ContactController::class, 'create'])->name('contact');
Route::post ('/contacto', [ContactController::class, 'store']);


Auth::routes();


