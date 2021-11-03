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

Route::get('/',[App\Http\Controllers\PagesController::class,'index'])->name('index');

Route::get('/category/{id}',[App\Http\Controllers\PagesController::class,'viewCategory'])->name('category');
Route::get('/book/{id}',[App\Http\Controllers\PagesController::class,'viewBook'])->name('book');
Route::group(['middleware'=>'auth'],function (){
    Route::post('/comment/{id}',[App\Http\Controllers\PagesController::class,'addComment'])->name('comment');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'roles','roles'=>['admins','users']],function (){
    Route::get('/upload', [App\Http\Controllers\UploadController::class ,'index'])->name('upload');
    Route::post('/upload',  [App\Http\Controllers\UploadController::class, 'upload'])->name('upload.save');
});


Route::group(['prefix'=>'admin','middleware'=>'roles','roles'=>'admins'],function (){
    Route::get('users',[App\Http\Controllers\AdminUsersController::class, 'index']);

    Route::get('categories',[App\Http\Controllers\AdminCategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create',[App\Http\Controllers\AdminCategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/store',[App\Http\Controllers\AdminCategoryController::class, 'store'])->name('categories.store');
});
