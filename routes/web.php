<?php

use App\Http\Controllers\ThemeController;
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

Route::resource('/', App\Http\Controllers\PostController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Users routes
//Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('user.index');
//Route::get('/users/create', [App\Http\Controllers\UsersController::class, 'create'])->name('user.create');
Route::resource('admin/users', \App\Http\Controllers\UsersController::class);
Route::resource('admin/posts', \App\Http\Controllers\PostController::class);
Route::resource('admin/themes', ThemeController::class);
//Route::get('/activeusers', [\App\Http\Controllers\ActiveUsersController::class, 'welcome'])
//    ->name('activeusers.welcome')
//    ->middleware('check.user.active');

Route::get('/changetheme/{id}', function($id){
    // Set cookie with theme id
    // Redirecting back to the previous page

    return redirect()->back()->withCookie(cookie('theme', $id, 525600));

})->name('changetheme');
