<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/test/ideas', [\App\Http\Controllers\Test\Api\IdeaApiTestController::class, 'index']);

Route::apiResource('/ideas', \App\Http\Controllers\Api\IdeaApiController::class);
Route::get('/statuses', \App\Http\Controllers\Api\StatusApiController::class);
Route::get('/categories', \App\Http\Controllers\Api\CategoryApiController::class);

Route::get('test/hashed-pass', function(Request $request) {
    $hashedPass = \Illuminate\Support\Facades\Hash::make($request->query('pass'));
    return response()->json([
        'success' => true,
        'message' => 'Get hashed pass',
        'data' => $hashedPass
    ] ,200);
});
