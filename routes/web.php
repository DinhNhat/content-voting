<?php

use App\Http\Controllers\IdeaController;
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

Route::get('/', [IdeaController::class, 'index'])->name('idea.index');
Route::get('/ideas/{idea:slug}',[IdeaController::class, 'show'])->name('idea.show');

Route::get('/test/ideas', [\App\Http\Controllers\Test\IdeaTestController::class, 'index'])->name('idea.index-test');
Route::get('/test/ideas/{idea:slug}', [\App\Http\Controllers\Test\IdeaTestController::class, 'show'])->name('idea.show-test');

require __DIR__.'/auth.php';
