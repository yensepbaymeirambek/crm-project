<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'signin'])->name('signin');
Route::post('/login/sign-up', [LoginController::class, 'signup'])->name('signup');

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => ['auth', 'setlocale'],
], function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/notifications', function () {return view('notifications.index');})->name('notifications');
    Route::get('/settings', function () {return view('settings.index');})->name('settings');
    Route::get('/help', function () {return view('welcome');})->name('help');
    Route::get('/logout', [LoginController::class, 'logout'])->name('exit');
    Route::post('/local', [LoginController::class, 'local'])->name('localization');
});

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => ['auth', 'admin','setlocale'],
], function (){
    Route::get('/employee/{id}', [EmployeesController::class, 'show'])->name('employee');
    Route::get('/employees', [EmployeesController::class, 'index'])->name('employees');
    Route::post('/employees/store', [EmployeesController::class, 'store'])->name('store');
});
