<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

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

Route::post('new-user', [APIController::class, 'newUser']);

Route::middleware('auth:api')->group(function () {
    Route::get('get-data/{id}', [APIController::class, 'getData']);
    Route::post('new-data', [APIController::class, 'newData']);
    Route::put('update-data/{id}', [APIController::class, 'updateData']);
    Route::delete('delete-data/{id}', [APIController::class, 'deleteData']);
});
