<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ApparatusController;
use App\Http\Controllers\BreakagesController;
use App\Http\Controllers\ChemicalsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/apparatus', function () {
    return view('apparatus');
})->middleware(['auth', 'verified'])->name('apparatus');

Route::get('/Breakages', function () {
    return view('Breakages');
})->middleware(['auth', 'verified'])->name('Breakages');

Route::get('/chemicals', [ChemicalsController::class, 'index'])->name('chemicals');

Route::get('/user-management', function () {
    return view('user-management');
})->middleware(['auth', 'verified'])->name('user-management');

Route::POST('/addUser', [UserManagementController::class, 'addUser'])->name('addUser');
Route::POST('/addApparatus', [ApparatusController::class, 'addApparatus'])->name('addApparatus');
Route::POST('/addBreakages', [BreakagesController::class, 'addBreakages'])->name('addBreakages');
Route::POST('/addChemicals', [ChemicalsController::class, 'addChemicals'])->name('addChemicals');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
