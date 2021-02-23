@extends('layouts.app')

@section('content')
    <div class="flex items-center w-1/2 m-auto bg-teal-lighter">
        <div class="w-full p-8 m-4 bg-white rounded shadow-lg">
            <h1 class="block w-full mb-6 text-2xl text-center uppercase text-grey-darkest">login</h1>
            <form class="mb-4" action="{{ route('login') }}" method="post">
                @csrf
                <div class="flex flex-col mb-4">
                    <label class="mb-2 text-lg font-bold uppercase text-grey-darkest" for="email">Email</label>
                    <input class="px-3 py-2 border text-grey-darkest" type="email" name="email" id="email"
                        value="{{ old('email') }}">
                </div>
                <div class="flex flex-col mb-6">
                    <label class="mb-2 text-lg font-bold uppercase text-grey-darkest" for="password">Password</label>
                    <input class="px-3 py-2 border text-grey-darkest" type="password" name="password" id="password">
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <button
                    class="block px-5 py-2 mx-auto mb-2 text-lg text-indigo-500 uppercase border border-indigo-500 rounded bg-teal hover:bg-teal-dark"
                    type="submit">Post</button>
                @if (Route::has('password.request'))
                    <a class="block w-full text-sm text-center no-underline text-grey-dark hover:text-grey-darker"
                        href="{{ route('password.request') }}">Forgot password?</a>
                @endif

            </form>
        </div>
    </div>
@endsection
