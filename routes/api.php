<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FlashcardController;
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
// Route::resource('flashcards', FlashcardController::class);

// public routes

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/flashcards', [FlashcardController::class, 'index']);
Route::get('/flashcards/{id}', [FlashcardController::class, 'show']);
Route::get('/flashcards/search/{title}', [FlashcardController::class, 'search']);


// protected routes

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/flashcards', [FlashcardController::class, 'store']);
    Route::put('/flashcards/{id}', [FlashcardController::class, 'update']);
    Route::delete('/flashcards/{id}', [FlashcardController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);


});





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
