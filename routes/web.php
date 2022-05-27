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
    return view('post.create');
});
// Route::get('/post','App\Http\Controllers\PostController@index');
Route::get('/sample',[App\Http\Controllers\SampleController::class,'index']);
Route::delete('/sample/delete/{postId}',[App\Http\Controllers\SampleController::class,'delete'])->name('sample.delete');
Route::middleware('auth')->group(function(){
Route::post('/post',[App\Http\Controllers\PostController::class,'store'])->name('post.store');
Route::post('/posts',[App\Http\Controllers\PostController::class,'index'])->name('post.index');
Route::get('/post/show',[App\Http\Controllers\PostController::class,'show'])->name('post.show');
Route::get('/post/edit/{id}',[App\Http\Controllers\PostController::class,'edit'])->name('post.edit');
Route::post('/post/edit/{id}',[App\Http\Controllers\PostController::class,'update'])->name('post.update');
Route::get('/post',[App\Http\Controllers\PostController::class,'create'])->name('post.create');
Route::delete('/post/delete/{postId}',[App\Http\Controllers\PostController::class,'delete'])->name('post.delete');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
