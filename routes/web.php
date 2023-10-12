<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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


Route::get('/', [MainController::class, 'home'])-> name('index');

Route::get('/hello', [MainController::class, 'about']);

Route::get('/review', [MainController::class, 'review'])-> name('review');

Route::post('/review/check', [MainController::class, 'review_check']);



// Route::get('/user/{id}/{name}', function ($id, $name) {
//    return "ID ". $id." Name ". $name;
// });
