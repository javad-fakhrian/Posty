@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 p-6 bg-white rounded-lg">
            <form action="{{ route('register') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="your name" class="w-full p-4 bg-gray-100 border-2 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">

                    @error('name')
                        <div class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="your username" class="w-full p-4 bg-gray-100 border-2 rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}">

                    @error('username')
                        <div class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="your email" class="w-full p-4 bg-gray-100 border-2 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">

                    @error('email')
                        <div class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="your password" class="w-full p-4 bg-gray-100 border-2 rounded-lg @error('password') border-red-500 @enderror">

                    @error('password')
                        <div class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password again</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="repeat your password" class="w-full p-4 bg-gray-100 border-2 rounded-lg @error('password') border-red-500 @enderror">

                </div>

                <div>
                    <button type="submit" class="w-full px-4 py-3 font-medium text-white bg-blue-500 rounded">Register</button>
                </div>

            </form>
        </div>
    </div>
@endsection
