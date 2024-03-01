<?php

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\todoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\ComproController;
use App\Http\Controllers\SeederController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestoreController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Auth\LoginController;

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



Route::middleware(['auth', 'CekRole:admin'])->group(function(){
    Route::get('/history',[HistoryController::class, 'index']);
    Route::get('/user/{id}/detail',[UserController::class, 'index']);
    Route::get('/user/{id}/delete',[UserController::class, 'delete']);
    Route::get('/trash/user',[UserController::class, 'trash']);
    Route::put('/trash/user/{id}/restore',[UserController::class, 'restore']);
    Route::post('/trash/user/{id}/delete',[UserController::class, 'forceDelete']);
    Route::get('/submit/done/{id}',[todoController::class, 'submit']);
    Route::get('/settings', [SettingsController::class, 'index']);
    Route::get('/backup', [BackupController::class, 'backup']);
    Route::post('restore', [RestoreController::class, 'restore']);
    Route::get('/run-seeder', [SeederController::class, 'runSeeder']);
});

Route::middleware(['auth', 'CekRole:user'])->group(function(){
    Route::get('/create',[todoController::class, 'create']);
    Route::post('/create/store',[todoController::class, 'store']);
    Route::get('/edit/{id}',[todoController::class, 'edit']);
    Route::put('/edit/{id}/store',[todoController::class, 'update']);
});

Route::middleware(['auth', 'CekRole:admin,user'])->group(function(){
    // Routes accessible to both admin and user roles
    Route::get('/delete/{id}',[todoController::class, 'delete']);
    Route::post('/delete/{id}/force',[todoController::class, 'forceDelete']);
    Route::get('/home',[todoController::class, 'home']);
    Route::get('/details/{id}',[todoController::class, 'details']);
    Route::get('/trash',[todoController::class, 'trash']);
    Route::put('/trash/{id}/restore',[todoController::class, 'restore']);
    Route::get('/home/search', [todoController::class, 'search']);
    Route::get('/dashboard',[todoController::class, 'dashboard']);
    Route::get('/profile',[ProfileController::class, 'index']);
    Route::get('/profile/edit',[ProfileController::class, 'edit']);
    Route::post('/profile/edit/update',[ProfileController::class, 'update']);
});

Route::get('/',[ComproController::class, 'index']);
Route::get('/forgot/password', [UserController::class, 'resetView']);
Route::post('/reset/password/store', [UserController::class, 'storeReset']);
Route::get('/test', [TestController::class, 'index']);
Route::get('/test1', [TestController::class, 'index1']);
Route::get('/test2', [TestController::class, 'index2']);



Auth::routes();

