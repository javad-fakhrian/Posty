@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 p-6 bg-white rounded-lg">
            <form action="{{ route('posts') }}" method="POST" class="mb-4">
                @csrf
                <div class="mb-2">
                    <label for="body" class="sr-only"></label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="post somthing !"></textarea>

                    @error('body')
                        <div class="mt-2 text-sm text-red-500">
                            {{$message}}
                        </div>
                    @enderror

                </div>

                <div>
                    <button type="submit" class="px-4 py-2 font-medium text-white bg-blue-500 rounded-lg">Post</button>
                </div>

            </form>
            @if ($posts->count())
                @foreach ($posts as $post)
                <div class="mb-4">
                    <a href="{{ route('users.posts' , $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-sm text-gray-600">{{$post->created_at->diffForHumans()}}</span>
                    <p class="mb-2">{{ $post->body }}</p>
                </div>

                @can('delete', $post)

                    <div>
                        <form action="{{ route('posts.destroy',$post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">delete</button>
                        </form>
                    </div>

                @endcan

                <div class="flex items-center">
                    @auth
                        @if (! $post->likedBy(auth()->user()))
                            <form action="{{ route('posts.likes' , $post->id) }}" method="post" class="mr-1">
                                @csrf
                                <button type="submit" class="text-blue-500">Like</button>
                            </form>
                        @else
                            <form action="{{ route('posts.likes' , $post->id) }}" method="post" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500">Unlike</button>
                            </form>
                        @endif
                    @endauth
                    <span>{{$post->likes->count()}} likes</span>
                </div>

                @endforeach
                {{ $posts->links() }}
            @else
                <p>there are no posts !</p>
            @endif
        </div>
    </div>
@endsection
