<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OfficerController;
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

Route::view('/', 'pages.home')
    ->name('home');
Route::view('/about', 'pages.about')
    ->name('about');
Route::view('/service', 'pages.service')
    ->name('service');
Route::view('/contact', 'pages.contact')
    ->name('contact');

/**
 * AuthenticatedSessionController.
 */
Route::controller(AuthenticatedSessionController::class)->group(function () {
    Route::get('/login', 'index')
        ->middleware('guest')
        ->name('login');

    Route::post('/login/store', 'store')
        ->name('login.store');

    Route::get('/logout', 'destroy')
        ->name('logout');
});


Route::middleware(['auth:citizen,officer'])->group(function () {
    /**
     * DashboardController.
     */
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')
            ->name('dashboard');
    });

    /**
     * CitizenController.
     */
    Route::controller(CitizenController::class)->group(function () {
        Route::get('/citizens', 'index')
            ->name('citizens');

        Route::get('/citizen/create', 'create')
            ->name('citizen.create');

        Route::post('/citizen/store', 'store')
            ->name('citizen.store');

        Route::get('/citizen/{national_id}', 'show')
            ->name('citizen.show');

        Route::get('/citizen/{national_id}/edit', 'edit')
            ->name('citizen.edit');

        Route::post('/citizen/{national_id}/update', 'update')
            ->name('citizen.update');

        Route::post('/citizen/{national_id}/destroy', 'destroy')
            ->name('citizen.destroy');
    });

    /**
     * OfficerController.
     */
    Route::controller(OfficerController::class)->group(function () {
        Route::get('officers', 'index')
            ->name('officers');

        Route::get('/officer/create', 'create')
            ->name('officer.create');

        Route::post('/officer/store', 'store')
            ->name('officer.store');

        Route::get('/officer/{slug}', 'show')
            ->name('officer.show');

        Route::get('/officer/{slug}/edit', 'edit')
            ->name('officer.edit');

        Route::post('/officer/{slug}/update', 'update')
            ->name('officer.update');

        Route::post('/officer/{slug}/destroy', 'destroy')
            ->name('officer.destroy');
    });
});
