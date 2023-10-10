<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\UserRegistration;
use App\Livewire\ShowList;
use App\Livewire\AdminAuth;
use App\Livewire\CreateUser;
use App\Livewire\UpdateUser;

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

Route::get('/registration', UserRegistration::class)->name('registration');
Route::get('/list', ShowList::class)->name('list');
Route::get('/list/create-user', CreateUser::class);
Route::get('/list/edit-user/{id}', UpdateUser::class)->name('edit-user');
Route::get('/admin', AdminAuth::class)->name('admin');
