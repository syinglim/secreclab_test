<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productcontroller;

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

Route::get('/', function () {return view('welcome');});
Route::post('/products/store', [productcontroller::class, 'store']);
Route::get('/products/get_all_record', [productcontroller::class, 'get_all_record']);
Route::get('/products/{id}', [productcontroller::class, 'show']);


