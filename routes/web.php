<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Database\Seeders\DatabaseSeeder;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('posts',PostController::class);

Route::get('create/{count}', function($count){
    DatabaseSeeder::create($count);
    return "Created {$count} records";
});

Route::middleware('auth')->group(function(){
    Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');

});

