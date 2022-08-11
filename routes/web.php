<?php

use App\Http\Controllers\MetricsController;
use App\Http\Controllers\MyFirstModelController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/token', function () {
    return csrf_token();
});

Route::get('metrics', MetricsController::class);

Route::resource( 'my_first_model', MyFirstModelController::class);

