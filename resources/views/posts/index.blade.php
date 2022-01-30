@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
                <form action="{{ route('posts') }}" method="post" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('body') border-red-500 @enderror" placeholder="Post Something!"></textarea>
                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded font-medium w-full" type="submit">Post</button>
                    </div>

                </form>
            @endauth
            @if($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post"/>
                @endforeach
                <div class="flex">
                    {{ $posts->links('pagination::bootstrap-4') }}
                </div>
                  

            @else 
                <p>There are No Posts</p>
            @endif
        </div>
    </div>
    
@endsection