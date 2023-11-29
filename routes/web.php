<?php

use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Promise\Create;
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

Route::get('/assosLogin', function () {
    return view('auth.AssosLogin');
});

Route::get('/assosRegister', function () {
    return view('auth.AssosRegister');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/assos/dashboard', function () {
    return view('assos.dashboard');
})->middleware(['auth:association', 'verified'])->name('assos.dashboard');

Route::get('/assos/dashboard', [EvenementController::class, 'index'])->middleware(['auth:association', 'verified'])->name('assos.dashboard');

require __DIR__ . '/assosAuth.php';

// Route::middleware(['auth:association'])->group(function () {
//     Route::get('/evenement/ajouter', function () {
//         return view('evenements.ajouter');
//     })->name('ajouterEvenement');
// });

Route::get('/evenement/ajouter', function () {
    return view('evenements.ajouter');
})->middleware(['auth:association'])->name('ajouterEvenement');


Route::post('/ajouterEvenement', [EvenementController::class, 'store'])->name('ajout');

Route::get('/ajouterEvenement', [EvenementController::class, 'store'])->name('ajout');

Route::get('/DetailEvenement{id}', [EvenementController::class, 'show'])->middleware(['auth:association'])->name('details');

Route::get('/modifier{id}', [EvenementController::class, 'showmodif'])->middleware(['auth:association'])->name('modifdetail');

Route::post('/modifierEvenement{id}', [EvenementController::class, 'update'])->middleware(['auth:association'])->name('modifier');

Route::get('/supprimerEve{id}', [EvenementController::class, 'destroy'])->middleware(['auth:association'])->name('supprimer');

Route::post('/Cloturer{id}', [EvenementController::class, 'edit'])->middleware(['auth:association'])->name('cloturer');





Route::get('/dashboard', [EvenementController::class, 'index2'])->middleware(['auth', 'verified'])->name('client.dashboard');
