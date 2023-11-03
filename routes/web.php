<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [LoginController::class, 'login_page'])->name('login_page');
Route::post('/', [LoginController::class, 'login_check'])->name('login_check');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('registration', [LoginController::class, 'registration_page'])->name('registration');
Route::post('registration', [LoginController::class, 'add_registration'])->name('add_registration');

Route::prefix('user')->name('user.')->group(function(){
    Route::middleware('auth')->group(function(){
       Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
       Route::get('chat', [ChatController::class, 'chat'])->name('chat');
       Route::post('chat_message', [ChatController::class, 'chat_message'])->name('chat_message');
    });
});

