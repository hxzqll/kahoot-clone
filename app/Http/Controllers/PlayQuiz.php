<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Quiz;
use Illuminate\Http\Request;

class PlayQuiz extends Controller
{
    public function index($qid)
    {
        $pin = mt_rand(111111,999999);

        $quiz = Quiz::find($qid);
        $g = $quiz->games()->create(['pin'=>$pin,'start'=>0]);
        return view('quiz.play',['pin'=>$pin,'gid'=>$g->id]);
    }
    public function getConnectedPlayers($gid){
        $game = Game::find($gid);
        // $game->players()->create(['name'=>'hizqeel']);
        $players = $game->players;
        return $players;
    }

    public function getQuestions($gid){
        $game = Game::find($gid);
        if($game == null){
            return ['game'=>'invalid'];
        }
        $questions = $game->quiz->questions;
        return $questions;
    }

    public function checkStart($gid){
        $game = Game::find($gid);
        return ['start'=>$game->start];
    }

    public function startQuiz($gid){
        $game = Game::find($gid);
        $game->update(['start'=>'true']);

    }

    public function getallresults($gid){
        $game = Game::find($gid);
        $players = $game->players;
        $results = [];
        foreach($players as $player){
            $attempts = $player->attempts;
            $score = 0;
            $correct = 0;
            $incorrect = 0;
            foreach ($attempts as $attempt) {
                if($attempt->option == $attempt->question->correctAnswer){
                    $score = $score + 10;
                    $correct++;
                }
                else {
                    $score = $score - 5;
                    $incorrect++;
                }
            }
            array_push($results,['name'=>$player->name,'score'=>$score,'correct'=>$correct,'incorrect'=>$incorrect]);
        }
        return $results;

    }

    public function deletegame($gid){
        $game = Game::find($gid);
        return $game->delete();

    }
    
    
}
