<?php

use App\Http\Controllers\TanamanController;
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

Route::get('/', [TanamanController::class, 'data'])->name('dashboard');
Route::get('/create', [TanamanController::class, 'create'])->name('create');
Route::post('/store', [TanamanController::class, 'store'])->name('store');
Route::get('/edit/{id}', [TanamanController::class, 'edit'])->name('edit');
Route::patch('/update/{id}', [TanamanController::class, 'update'])->name('update');
Route::delete('/destroy/{id}', [TanamanController::class, 'destroy'])->name('destroy');

