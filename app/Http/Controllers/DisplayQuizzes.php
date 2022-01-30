<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayQuizzes extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // dd($user->quizes[0]->title);
        $quizzes = $user->quizes;
        return view('quiz.display',['quizzes'=>$quizzes]);
    }
}
