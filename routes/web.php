<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ApparatusController;
use App\Http\Controllers\BreakagesController;
use App\Http\Controllers\UserList;
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



Route::get('/dashboard', function () {
    return view('dashboard.index');})->name('dashboard');

Route::get('list',[UserList::class,'show']);

    
Route::get('/apparatus', function () {
    return view('apparatus');
})->middleware(['auth', 'verified'])->name('apparatus');

Route::get('/Breakages', function () {
    return view('Breakages');
})->middleware(['auth', 'verified'])->name('Breakages');

Route::get('/user-management',[UserManagementController::class,'index'])->middleware(['auth', 'verified'])->name('user-management');


Route::post('/addUser', [UserManagementController::class, 'addUser'])->name('addUser');
Route::post('/addApparatus', [ApparatusController::class, 'addApparatus'])->name('addApparatus');
Route::post('/addBreakages', [BreakagesController::class, 'addBreakages'])->name('addBreakages');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
