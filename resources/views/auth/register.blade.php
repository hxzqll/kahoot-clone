@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-3/12 bg-white p-6">
            <h1 class="text-xl text-center mb-2">Sign Up</h1>

            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input placeholder="Your Name" type="text" name='name' class="bg-gray-100 border-2 w-full p-4 @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input placeholder="Username" type="text" name='username' class="bg-gray-100 border-2 w-full p-4 @error('username') border-red-500 @enderror" value="{{ old('username') }}">
                    @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input placeholder="Your Email" type="email" name='email' class="bg-gray-100 border-2 w-full p-4 @error('email') border-red-500 @enderror" value='{{ old('email') }}'>
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input placeholder="Choose a Password" type="password" name='password' class="bg-gray-100 border-2 w-full p-4 @error('password') border-red-500 @enderror">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Repeat Password</label>
                    <input placeholder="Repeat Your Password" type="password" name='password_confirmation' class="bg-gray-100 border-2 w-full p-4">
                </div>
                <div>
                    <button type='submit' class="bg-color text-white px-4 py-3 rounded font-medium w-full">
                        Register
                    </button>
                </div>
                
            </form>
        </div>
    </div>
    
@endsection