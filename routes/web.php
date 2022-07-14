<?php

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
})->name('index');

Route::get('/about', [\App\Http\Controllers\PageController::class, 'about'])->name('about');

Route::get('/contact', [\App\Http\Controllers\PageController::class, 'contact'])->name('contact');

Route::post('/contact',  [\App\Http\Controllers\PageController::class, 'submitContact']);

Route::resource('questions', \App\Http\Controllers\QuestionController::class );

Route::resource('answers', \App\Http\Controllers\AnswersController::class, ['except' => ['index', 'create', 'show']]);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

