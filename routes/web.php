<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProductController;
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

Route::get('/',[ProductController::class,'index']);
Route::get('/product/{id}',[ProductController::class,'show'])->where('id', '[0-9]+');
Route::post('/product/appoint',[ProductController::class,'appoint'])->middleware('auth');
Route::view('/contact','contact');
Route::view('/about','about');
Route::get('/appointment',AppointmentController::class);

require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
