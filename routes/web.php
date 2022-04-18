<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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


Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::post('/create', [UserController::class, 'store'])->name('user.store');
Route::post('/createListUser',[UserController::class,'storeListUser'])->name('user.storeListUser');
Route::post('/sortToOneGroup',[UserController::class, 'sortToOneGroup'])->name('user.sort.one.group');
Route::post('/sortToManyGroup',[UserController::class, 'sortToManyGroup'])->name('user.sort.many.group');
Route::get('/deleteUser/{id}',[UserController::class,'destroy'])->name('user.delete');
