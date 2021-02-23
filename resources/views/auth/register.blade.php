@extends('layouts.app')

@section('content')
    <div class="flex items-center w-1/2 m-auto bg-teal-lighter">
        <div class="w-full p-8 m-4 bg-white rounded shadow-lg">
            <h1 class="block w-full mb-6 text-2xl text-center uppercase text-grey-darkest">register</h1>
            <form class="mb-4" action="{{ route('register') }}" method="post">
                @csrf
                <div class="flex flex-col mb-4">
                    <label class="mb-2 text-lg font-bold uppercase text-grey-darkest" for="name">Full name</label>
                    <input class="px-3 py-2 border text-grey-darkest" type="text" name="name" id="name"
                        value="{{ old('name') }}">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 text-lg font-bold uppercase text-grey-darkest" for="email">Email</label>
                    <input class="px-3 py-2 border text-grey-darkest" type="email" name="email" id="email"
                        value="{{ old('email') }}">
                </div>
                <div class="flex flex-col mb-6">
                    <label class="mb-2 text-lg font-bold uppercase text-grey-darkest" for="password">Password</label>
                    <input class="px-3 py-2 border text-grey-darkest" type="password" name="password" id="password">
                </div>
                <div class="flex flex-col mb-6">
                    <label class="mb-2 text-lg font-bold uppercase text-grey-darkest"
                        for="password_confirm">Password</label>
                    <input class="px-3 py-2 border text-grey-darkest" type="password" name="password_confirmation"
                        id="password_confirm">
                </div>
                <button
                    class="block px-5 py-2 mx-auto mb-2 text-lg text-indigo-500 uppercase border border-indigo-500 rounded bg-teal hover:bg-teal-dark"
                    type="submit">Register</button>
                @if (Route::has('password.request'))
                    <a class="block w-full text-sm text-center no-underline text-grey-dark hover:text-grey-darker"
                        href="{{ route('login') }}">Already have an account?</a>
                @endif
            </form>
        </div>
    </div>
@endsection
