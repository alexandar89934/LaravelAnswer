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



Route::resource('questions', \App\Http\Controllers\QuestionController::class );

Route::resource('answers', \App\Http\Controllers\AnswersController::class, ['except' => ['index', 'create', 'show']]);

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/about', [\App\Http\Controllers\PageController::class, 'about'])->name('about');

Route::get('/contact', [\App\Http\Controllers\PageController::class, 'contact'])->name('contact');

Route::post('/contact',  [\App\Http\Controllers\PageController::class, 'sendContact']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile/{user}', [\App\Http\Controllers\PageController::class, 'profile' ])->name('profile');

Route::get('/upload', [App\Http\Controllers\UploadController::class, 'getUpload'])->name('upload');

Route::post('/upload', [App\Http\Controllers\UploadController::class, 'postUpload']);

Route::get('/github/{username}',  [\App\Http\Controllers\ApiController::class, 'github' ])->name('github');

Route::get('/weather', [App\Http\Controllers\ApiController::class, 'getWeather'])->name('weather');

Route::post('/weather', [App\Http\Controllers\ApiController::class, 'postWeather']);

Route::get('/weather/js', [App\Http\Controllers\ApiController::class, 'getWeatherJs'])->name('weather.js');