<?php

use App\Http\Controllers\GroupController;
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

Route::resource('/groups/indexGroups', GroupController::class);
Route::get('/groups/indexGroups', [GroupController::class, 'index'])->name('index');
Route::get('/groups/indexGroupsСreate', [GroupController::class, 'create'])->name('create');
//проверка наличие группы
Route::post('/groups/indexGroupsСreate/check', [GroupController::class, 'Сreate_check']);

Route::get('/groups/indexGroups/{group}/edit', [GroupController::class, 'edit'])->name('edit');

Route::put('/groups/indexGroups/{group}', [GroupController::class, 'update'])->name('update');

Route::get('/groups/indexGroups/{group}/view', [GroupController::class, 'show'])->name('view');

Route::delete('/groups/indexGroupsСreate/{id}', [GroupController::class, 'delete'])->name('create.delete');

// Route::get('/user/{id}/{name}', function ($id, $name) {
//    return "ID ". $id." Name ". $name;
// });
