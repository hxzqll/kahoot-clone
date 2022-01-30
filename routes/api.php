<?php

use App\Http\Controllers\createQuiz;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PlayQuiz;
use App\Http\Controllers\TestApi;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test',[TestApi::class,'index']);
Route::get('getPlayers/{id}',[PlayQuiz::class,'getConnectedPlayers']);
Route::get('getQuestions/{id}',[PlayQuiz::class,'getQuestions'])->name('getquestions');
Route::get('getallresults/{id}',[PlayQuiz::class,'getallresults'])->name('getallresults');
Route::get('deletegame/{id}',[PlayQuiz::class,'deletegame'])->name('deletegame');


Route::get('checkStart/{id}',[PlayQuiz::class,'checkStart'])->name('checkstart');
Route::get('/startQuiz/{id}',[PlayQuiz::class,'startQuiz'])->name('startquiz');
Route::get('/player/id/{pid}/question/{qid}/option/{op}',[PlayerController::class,'attempt'])->name('attempt');
Route::get('/player/{pid}/results',[PlayerController::class,'getResults'])->name('getresults');
Route::get('/player/{pid}/reset',[PlayerController::class,'resetAttempts'])->name('resetattemps');