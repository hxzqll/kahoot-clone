@extends('layouts.app')

@section('content')
    <script>
        var arr = [];
        function dynamicSort(property) {
            var sortOrder = 1;
            if(property[0] === "-") {
                sortOrder = -1;
                property = property.substr(1);
            }
            return function (a,b) {
              
                var result = (a[property] < b[property]) ? -1 : (a[property] > b[property]) ? 1 : 0;
                return result * sortOrder;
            }
        }
        async function refreshPlayers(){
            let gid = {{$gid}};
            var link =`http://localhost:8000/api/getPlayers/${gid}`; 
           await fetch(link)
           .then(res=>res.json())
           .then(function(d){
               
                // document.getElementById('names').append('hizqeel');
                d.forEach(data => {
                    // console.log(arr);
                    if(!arr.includes(data['name'])){
                        document.getElementById('names').insertAdjacentHTML('beforeend','</p>'+data['name']+' Joined</p>');
                        arr.push(data['name']);
                    }
                     
                    // console.log(data['name']);
                });
           });
        }
        refreshPlayers();
        var refreshIntervel = setInterval(refreshPlayers,2000);
        async function beginGame(){
            clearInterval(refreshIntervel);
            document.getElementById("wait").style.display='none';

            await fetch(`{{route('startquiz',['id'=>$gid])}}`);
            await fetch(`{{route('getquestions',['id'=>$gid])}}`)
            .then(res=>res.json())
            .then(data=>{
                setTimeout(() =>{
                    document.getElementById("question").innerHTML = 'Quiz Completed';
                    fetch(`{{route('getallresults',['id'=>$gid])}}`)
                    .then(res=>res.json())
                    .then(d=>{
                        d.sort(dynamicSort("Score"));
                        console.log(d);
                        document.getElementById("question").innerHTML = `<b>Quiz Completed</b>
                       
                        
                        `;
                        setTimeout(() => {
                            fetch(`{{route('deletegame',['id'=>$gid])}}`);
                        }, 1000);
                        document.getElementById('results').style.display = 'block';
                        d.forEach((x)=>{
                            document.getElementById("resultstable").insertAdjacentHTML("beforeend",`
                            <tr>
                                <td class='pr-4'>${x.name}</td>
                                <td class='pr-4'>${x.score}</td>
                                <td>${x.correct}</td>
                            </tr>
                        `);
                        });
                    });
                }, (data.length*15000) + 5000);
            });
            document.getElementById("question").style.display = 'block';
        }
    </script>
    <div class="flex justify-center">
     
        <div class="w-8/12 bg-white p-6 flex justify-center items-center flex-col ">
            <div id="wait">
            <button onclick="beginGame()" class="bg-color text-white px-4 py-3 rounded font-medium w-full">
                Start Quiz
            </button>
           
            <h1 class='text-xl'>{{$pin}}</h1>
            <h1 class="text-m">Waiting for Players</h1>
            <div id='names'></div>
            </div>
            <div id="question" style="display: none">
                Waiting for Players to Finish the Quiz
                {{-- <x-question-slide classes="" id="1"/> --}}
            </div>
            <div id="results" style="display: none">
                <p><b> Player Ranking </b> </p>
            <table class="table-auto " id='resultstable'>
                
                <thead>
                    <tr>
                      <th class='pr-4'>Name</th>
                      <th class="pr-4">Score</th>
                      <th>Correct</th>
                    </tr>
                  </thead>
                 
                </table>
            </div>
        </div>
    </div>
    
@endsection