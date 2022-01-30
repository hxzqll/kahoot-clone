@extends('layouts.player')

@section('content')
    <div class="flex justify-center">
        <div class="w-9/12 bg-white p-6 mt-32">
            <form action="{{ route('player.join') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="pin" class="sr-only"></label>
                <input placeholder="Enter Name" type="text" name='name' class="bg-gray-100 border-2 w-full p-4" required>
            </div>
            <div class="mb-4">
                <label for="pin" class="sr-only"></label>
                <input placeholder="Enter Game Pin" type="number" name='pin' class="bg-gray-100 border-2 w-full p-4" required>
            </div>
            <button type='submit' class="bg-color text-white px-4 py-3 rounded font-medium w-full">
                Join
            </button>
            </form>
        </div>
    </div>
    
@endsection