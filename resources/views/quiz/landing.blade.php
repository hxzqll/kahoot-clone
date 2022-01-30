@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6">
            <form action="{{ route('landing.quiz') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="title" class="sr-only">Quiz Title</label>
                <input placeholder="Your Quiz Title" type="text" name='title' class="bg-gray-100 border-2 w-full p-4 @error('email') border-red-500 @enderror" value='{{ old('title') }}'>
                @error('title')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <button type='submit' class="bg-color text-white px-4 py-3 rounded font-medium w-full">
                Create
            </button>
            </form>
        </div>
    </div>
    
@endsection