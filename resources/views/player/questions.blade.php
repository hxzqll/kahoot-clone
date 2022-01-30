@extends('layouts.player')

@section('content')
<script>
   
    window.onload = async function(){
        // var link = {{route('getquestions',['id'=>$gid])}};
        // console.log(link);
       await fetch(`{{route('getquestions',['id'=>$gid])}}`)
        .then(res=>res.json())
        .then(data=>{
            if(data.game === 'invalid'){
                history.back();
            }
            questions = data;
            
            checkstart(questions);
        });
        await fetch(`{{route('resetattemps',['pid'=>$pid])}}`);
        
    }
        let wasAttempted = false;
      let attemptQuestion = (qid, op, pid = `{{$pid}}`) => {
           document.getElementById('questions').innerHTML = '<p class="text-xl text-center">Please Wait</p>';
            fetch(`http://localhost:8000/api/player/id/${pid}/question/${qid}/option/${op}`);
        wasAttempted = true;
       }


    let checkstart = (ques) => {
        start = false;
        console.log('yes');
       
            fetch(`{{route('checkstart',['id'=>$gid])}}`)
                .then(res=>res.json())
                .then(data=>{
                    // console.log(data['start']);
            start = data['start'];
            });
            setTimeout(function(){
                console.log(start);
                if(start == false){
                    checkstart(ques);
                } else {
                    startquiz(ques);
                    startTimer();
                }
               
            },2000);
            
        
    }
   
    let seconds = 15;
    var q = 0;
    var stoptimer = false;
    function startTimer(){
        
        document.getElementById('time').innerHTML = `<b>Time Left:</b> ${seconds}`;
        seconds--;
        if(!stoptimer){
            setTimeout(startTimer, 1000);
        } else {
            document.getElementById('time').innerHTML = ``;

        }
    }

    let getResults = async () => {
        fetch(`http://localhost:8000/api/player/{{$pid}}/results`).then(res=>res.json()).then(data=>{
            document.getElementById('questions').innerHTML = `
            <div>
            <p class="text-xl text-center">Your Score ${data.score}</p>
            <p class="text-base text-center">You made ${data.correct} Correct attempts & ${data.incorrect} incorrect attempts</p>
            </div>
            `;
            // console.log(data);
        });

    }
    
    let startquiz = (questions) => {
        
        wasAttempted = false;
        var title = questions[q].title;
        var id = questions[q].id;
        
        document.getElementById('questions').innerHTML = `<x-question-slide classes="" title="${questions[q].title}" id="${questions[q].id}" a1="${questions[q].a1}" a2="${questions[q].a2}" a3="${questions[q].a3}" a4="${questions[q].a4}"/>`;
        
        setTimeout(async function(){
            await setTimeout(() => {
                console.log('waiting');
            }, 1000);
            seconds = 15;
            q++;
            if(!(q===questions.length)){
                if(wasAttempted === false){
                    await fetch(`http://localhost:8000/api/player/id/{{$pid}}/question/${id}/option/0`);
                }
                
                startquiz(questions);
            }
            else {
                if(wasAttempted === false){
                    await fetch(`http://localhost:8000/api/player/id/{{$pid}}/question/${id}/option/0`);
                }
                stoptimer = true;
                document.getElementById('time').innerHTML = `.`;
                getResults();
                // document.getElementById('questions').innerHTML = `Your Results`;
            }
        },15000);
       
       
    
    }
</script>
    <div class="flex justify-center">
        <div class="w-9/12 bg-white p-6 mt-5">
            <p id="time" class='text-center text-xl'></p>
           <div id="questions">
            {{-- <x-question-slide classes="" title="${questions[q].title}" id="1" /> --}}
            <p class='text-center text-lg'>Waiting for Quiz to Start </p>
           </div>
        </div>
    </div>
    
@endsection