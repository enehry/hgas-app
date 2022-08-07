<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageMelcsController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return Inertia::render('Auth/Login');
});

Route::middleware([
  'auth:sanctum',
])->group(function () {

  # Admin Routes
  Route::middleware([
    'admin',
  ])->group(function () {
    Route::resource('/users', UserController::class);
  });

  Route::get('/', function () {
    return to_route('dashboard');
  });
  Route::post('/generate', DashboardController::class . '@generate')->name('generate');


  Route::get('/dashboard', DashboardController::class . '@index')->name('dashboard');
  Route::get('/manage-melcs', ManageMelcsController::class . '@index')->name('manage-melcs.index');
  Route::get('/page-not-found', fn () => Inertia::render('PageNotFound'))->name('PageNotFound');
});
