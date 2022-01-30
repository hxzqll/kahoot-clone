<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\createQuiz;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisplayQuizzes;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PlayQuiz;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Models\Player;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Route::get('/',function(){
//     return view('home');
// })->name('home');

Route::get('/users/{user:username}/posts',[UserPostController::class, 'index'])->name('users.posts');


Route::post('/logout',[LogoutController::class, 'logout'])->name('logout');


Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'signIn']);

Route::get('/',[DisplayQuizzes::class,'index'])->name('home')->middleware('auth');
Route::get('/quiz/create/{id}',[createQuiz::class,'index'])->name('create.quiz');
Route::post('/quiz/create/{id}',[createQuiz::class,'addQuestions']);
Route::get('/quiz/delete/{id}',[createQuiz::class,'delete'])->name('quiz.delete');

Route::get('quiz/start/{id}',[PlayQuiz::class,'index'])->name('quiz.start');

Route::get('/quiz/landing',[createQuiz::class,'landing'])->name('landing.quiz');
Route::post('/quiz/landing',[createQuiz::class,'create']);


Route::get('/player',[PlayerController::class,'index'])->name('player');
Route::post('/player/join',[PlayerController::class,'joinGame'])->name('player.join');
Route::get('/player/begin/{id}',[PlayerController::class,'beginGame'])->name('player.begin');
Route::get('/player/{id}/{pid}/questions',[PlayerController::class,'questions'])->name('player.questions');


Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);

// Route::get('/posts',[PostController::class, 'index'])->name('posts');
// Route::post('/posts',[PostController::class, 'store']);
// Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');
// Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');


// Route::post('/posts/{post}/likes',[PostLikeController::class, 'store'])->name('posts.likes');
// Route::delete('/posts/{post}/likes',[PostLikeController::class, 'destroy'])->name('posts.likes');


