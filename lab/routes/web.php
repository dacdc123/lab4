<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\PostDec;
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

// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/',[MovieController::class, 'index'])->name('home');

Route:: middleware(['auth', CheckAuth::class])->prefix('movies')->group(function () {
    Route::get('/',             [MovieController::class, 'index'])->name('index');
    Route::get('/create',       [MovieController::class, 'create'])->name('create');
    Route::post('create',       [MovieController::class, 'store'])->name('movies.store');
   
    Route::get('/edit/{movie}', [MovieController::class, 'edit'])->name('edit');;
    Route::put('edit/{movie}',  [MovieController::class, 'update'])->name('movies.update');
    
    Route::delete('delete/{id}',[MovieController::class, 'destroy'])->name('movies.destroy');
    
    Route::get('/{id}',          [MovieController::class, 'show'])->name('movies.show');
    Route::get('/trash',         [MovieController::class, 'trash'])->name('movies.trash');

    Route::get('/search',        [MovieController::class, 'search'])->name('movies.search');


});
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('home');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->middleware('auth');
Route::get('/admin/users', [UserController::class, 'listUsers'])->middleware('auth')->name('admin');
Route::post('/admin/users/{id}/toggle', [UserController::class, 'toggleActive'])->middleware('auth');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
