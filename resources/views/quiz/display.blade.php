@extends('layouts.app')

@section('content')
    <div class="flex justify-center mb-2"> 
        <h1 class='text-xl text-white'>Your Quizzes</h1>
    </div>
    <div class="flex justify-center">
        <div class="grid grid-cols-4 gap-1">
            @foreach ($quizzes as $quiz)
            <div class="w-32 h-32 bg-white p-6 m-3 justify-center items-center flex flex-col">
                {{$quiz->title}}
            
                <div class="flex flex-row mt-4"><a href="{{route('quiz.start',['id'=>$quiz->id])}}"><i class="fas fa-play hover:text-gray-500"></i></a>
                    <a href="{{route('quiz.delete',['id'=>$quiz->id])}}"><i class="fas fa-trash ml-4 hover:text-gray-500"></i></a>
            </div>
            </div>
            @endforeach
        
        
        
        
        </div>
    </div>
    
@endsection