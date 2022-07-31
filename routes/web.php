<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartJSController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\FlowController;

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
    return view('index');
})->name('index');

Route::get('chart', [ChartJSController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('salaries', SalaryController::class);
    Route::resource('flows', FlowController::class);
    Route::resource('fixeds', FixedCostController::class);
    
    Route::get('/stage/balances', function () {
        return view('/stage/balances');
    })->name('balances');
});
