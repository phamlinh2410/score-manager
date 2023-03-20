<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {
    return Hash::make('123456');
});

Route::get('/login', [LoginController::class, 'loginForm'])->name('login-form');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/forgot-password', [LoginController::class, 'resetPasswordForm'])->name('forgot-password');

Route::middleware(['auth.login'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

    Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');

    Route::get('/subject-register', [SubjectController::class, 'registerForm'])->name('subject.register');

    Route::post('/subject-register', [SubjectController::class, 'confirmRegister'])->name('subject.register.confirm');

    Route::post('/subject-register-submit', [SubjectController::class, 'submitRegister'])->name('subject.register.submit');

    Route::get('/subject-register-successfull', [SubjectController::class, 'registerSuccessfull'])->name('subject.register.successfull');

    Route::post('/subject', [SubjectController::class, 'search'])->name('subject.search');

    Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit');
});

Route::middleware(['auth.login'])->prefix('teacher')->group(function() {
    Route::get('', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::get('/edit/{id}', [TeacherController::class, 'editForm'])->name('teacher.edit-form');
    Route::put('/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::delete('/delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');
});


