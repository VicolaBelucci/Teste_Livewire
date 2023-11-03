<?php

use App\Livewire\PostCreate;
use App\Livewire\PostEdit;
use App\Livewire\PostIndex;
use App\Livewire\PostShow;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post/create', PostCreate::class)->name('post.create');
Route::get('/post/edit/{post}', PostEdit::class)->name('post.edit');
Route::get('/post/{post}', PostShow::class)->name('post.show');
Route::get('/post', PostIndex::class)->name('post.index');
