<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class createQuiz extends Controller
{
    public function index($qid){
        
        return view('quiz.create',['id'=>$qid]);
    }
    public function landing(){
        return view('quiz.landing');
    }
    public function create(Request $request){
        // dd('s');
        $this->validate($request,[
            'title'=>'required',
        ]);
        $p = $request->user()->quizes()->create($request->only('title'));
        return redirect()->route('create.quiz',['id'=>$p]);

    }
    public function addQuestions($qid,Request $request){
        // dd('yes');
    // $this->validate($request,['*.title'=>'required']);
    $quiz = Quiz::find($qid);
    $questionCounter = (int) $request->slideCount;
    // dd($request);
    
    for($i=1;$i <= $questionCounter; $i++){
    //    print_r(${'title-'.$i}); 
    $title = $request->title[$i];
    $a1 = $request->a1[$i];
    $a2 = $request->a2[$i];
    $a3 = $request->a3[$i];
    $a4 = $request->a4[$i];
    $correct = $request->correct[$i];
    $quiz->questions()->create(['title'=>$title,'a1'=>$a1,'a2'=>$a2,'a3'=>$a3,'a4'=>$a4,'correctAnswer'=>$correct]);
      
    }
    return redirect()->route('home');
    // dd($request);
    //  $quiz->questions()->create(['title'=>'my title','a1'=>'test','a2'=>'tesii','a3'=>'yes','a4'=>'no','correctAnswer'=>'1']);
    }

    public function delete($id){
        $quiz = Quiz::find($id);
        $quiz->delete();
        return redirect()->back();
    }
}
