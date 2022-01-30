<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        return view('player.join');
    }
    public function joinGame(Request $request){
        
        $game = Game::where('pin',$request->pin)->first();
        if($game == null){
            return redirect()->back();
        }
        $player = $game->players()->create(['name'=>$request->name]);
        // dd($game);
        return redirect()->route('player.questions',['id'=>$game,'pid'=>$player->id]);
    }
    public function questions($gid,$pid){
        return view('player.questions',['gid'=>$gid,'pid'=>$pid]);

    }

    public function attempt($pid, $qid, $op){
        // dd($pid . $qid . $op);
        $player = Player::find($pid);
        $player->attempts()->create(['question_id'=>$qid,'option'=>$op]);
        // dd('yes');
    }

    public function getResults($pid){
        $player = Player::find($pid);
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
        return ['score'=>$score, 'correct'=>$correct, 'incorrect'=>$incorrect];
        // dd($player->attempts[0]->question);
    }

    public function resetAttempts($pid){
        $player = Player::find($pid);
        $attempts = $player->attempts;
        foreach($attempts as $attempt){
            $attempt->delete();
        }

    }
}
