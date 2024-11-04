<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;


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

Route::get('/', function () {
    return redirect()->route('tampilan_awal');
});

Route::get('/', function () {
    return view('tampilan_awal');
})->middleware('auth');

Route::get('/tampilan_awal',[AdminController::class,'tampilan_awal'])->name('tampilan_awal');
Route::get('/admin_list',[AdminController::class,'admin_list'])->name('admin_list');
Route::get('/userdash',[UserController::class,'index'])->name('userdash');
Route::get('/list_project',[UserController::class,'list_project'])->name('list_project');
Route::get('/rekrutment',[AdminController::class,'rekrutment'])->name('rekrutment');
Route::get('/daftar_project',[ProjectController::class,'index'])->name('daftar_project');
Route::post('/insert_project',[ProjectController::class,'insertProject'])->name('insertProject');
Route::post('/ambil-project/{id}', [ProjectController::class, 'ambilProject'])->name('ambil_project');
Route::post('/uploads',[ProjectController::class,'upload'])->name('uploads');


Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/forgot_pass',[LoginController::class,'forgot_pass'])->name('forgot');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');