<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customerController;
// use App\Http\Controllers\NewController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(["middleware"=>"web"], function(){
    Route::view('/', 'layout');
Route::view('/customer', 'customer');
Route::get('/customeradd', [customerController::class, 'customeradd']);
Route::post('/customeradd', [customerController::class, 'addDetails']);
Route::view('/register', 'register');
Route::post('/register', [customerController::class, 'register']);
Route::view('/login', 'login');
Route::post('/login', [customerController::class, 'login']);
});