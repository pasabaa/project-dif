<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Notice;
use Illuminate\Http\Request;

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
    $title = 'Inicio - DIF Acámbaro';
    $notices = Notice::latest()->take(3)->get();;
    return view('welcome', compact('title', 'notices'));
});

Auth::routes();

//GROUP GUEST

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/acerca-de', [App\Http\Controllers\AboutController::class, 'showAbout'])->name('showAbout');

Route::get('/noticias', [App\Http\Controllers\NoticeController::class, 'showNotice'])->name('showNotice');

Route::get('/servicios', [App\Http\Controllers\ServiceController::class, 'showService'])->name('showService');

Route::get('/contacto', [App\Http\Controllers\ContactController::class, 'showContact'])->name('showContact');

Route::get('/salud-familiar', [App\Http\Controllers\FamilyController::class, 'showFamilies'])->name('showFamilies');

Route::get('/responsables', [App\Http\Controllers\ResponsibleController::class, 'showResponsibles'])->name('showResponsibles');

//GROUP AUTH
Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');

Route::resource('notices', App\Http\Controllers\NoticeController::class)->middleware('auth');

Route::resource('categories', App\Http\Controllers\CategoryController::class)->middleware('auth');

Route::resource('services', App\Http\Controllers\ServiceController::class)->middleware('auth');

Route::resource('types', App\Http\Controllers\TypeController::class)->middleware('auth');

Route::resource('modalities', App\Http\Controllers\ModalityController::class)->middleware('auth');

Route::resource('abouts', App\Http\Controllers\AboutController::class)->middleware('auth');

Route::resource('families', App\Http\Controllers\FamilyController::class)->middleware('auth');

Route::resource('responsable-family', App\Http\Controllers\ResponsableFamilyController::class)->middleware('auth');

Route::resource('responsibles', App\Http\Controllers\ResponsibleController::class)->middleware('auth');

Route::resource('contacts', App\Http\Controllers\ContactController::class);

//GROUP SEARCH

Route::post('/users/search', [UserController::class, 'searchUser'])->name('user.search');
