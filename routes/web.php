<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ApparatusController;
use App\Http\Controllers\BreakagesController;
use App\Http\Controllers\ChemicalsController;
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


/**
 * Dashboard Routes
 */
Route::controller(DashboardController::class)->middleware(['auth', 'verified'])->group(function () {
    // Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/dashboard','sum')->name('dashboard');
});

/**
 * User Routes
 */
Route::controller(UserManagementController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('/user-management', 'index')->name('user_management');
    Route::post('/addUser', 'addUser')->name('addUser');

});

/**
 * UserProfile Routes
 */
Route::controller(ProfileController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

/**
 * Apparatus Routes
 */
Route::controller(ApparatusController::class)->middleware(['auth', 'verified'])->group(function() {
    Route::get('/apparatus', 'index')->name('apparatus');
    Route::get('/apparatus/edit/{id}', 'findApparatus')->name('findApparatus');
    Route::post('/addApparatus', 'addApparatus')->name('addApparatus');
    Route::post('/apparatus/delete', 'deleteApparatus');
    Route::post('/apparatus/update', 'updateApparatus')->name('updateApparatus');
});

/**
 * Breakages Routes
 */
Route::controller(BreakagesController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('/breakages', 'index')->name('Breakages');
    Route::get('/breakages/edit/{id}', 'findBreakages')->name('findBreakages');
    Route::post('/addBreakages', 'addBreakages')->name('addBreakages');
    Route::post('/breakages/delete', 'deleteBreakages');
    Route::post('/breakages/update', 'updateBreakages')->name('updateBreakages');
});

/**
 * Chemicals Routes
 */
Route::controller(ChemicalsController::class)->middleware(['auth', 'verified'])->group(function() {
    Route::get('/chemicals', 'index')->name('chemicals');
    Route::get('/chemicals/edit/{id}', 'findChemicals')->name('findChemicals');
    Route::post('/addChemicals', 'addChemicals')->name('addChemicals');
    Route::post('/chemicals/delete', 'deleteChemicals');
    Route::post('/chemicals/update', 'updateChemicals')->name('updateChemicals');
});

Route::controller(DashboardController::class)->middleware(['auth', 'verified'])->group(function() {
    Route::get('/Dashboard', 'index')->name('Dashboard');
});


require __DIR__.'/auth.php';
