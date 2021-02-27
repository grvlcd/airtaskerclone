@extends('layouts.app')

@section('content')
    <div
        class="sticky p-6 m-auto mt-10 tracking-wide bg-white border-2 border-gray-300 rounded-md shadow-lg max-w-7xl top-5">
        <div class="flex flex-col">
            <h1 class="mb-2 text-2xl text-blue-500">Account Settings</h1>
            <form class="grid grid-cols-2" method="POST" enctype="multipart/form-data"
                action="{{ route('profile.update', $user) }}">
                @csrf
                <div class="flex flex-col mb-4">
                    <label class="mb-2 text-lg uppercase text-grey-darkest" for="name">Full name</label>
                    <input
                        class="px-2 py-1 border rounded-md w-10/12 text-grey-darkest @error('name') border-red-500 @enderror"
                        type="text" name="name" id="name" value="{{ $user->name ?? old('name') }}">
                    @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 text-lg uppercase text-grey-darkest" for="email">Email</label>
                    <input
                        class="px-2 py-1 border rounded-md w-10/12 text-grey-darkest @error('email') border-red-500 @enderror"
                        type="email" name="email" id="email" value="{{ old('email') ?? $user->email }}">
                    @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 text-lg uppercase text-grey-darkest" for="age">Age</label>
                    <input
                        class="px-2 py-1 border rounded-md w-10/12 text-grey-darkest @error('age') border-red-500 @enderror"
                        type="number" name="age" id="age" value="{{ $user->profile->age ?? old('age') }}">
                    @error('age')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 text-lg uppercase text-grey-darkest" for="birthday">Date of birth</label>
                    <input
                        class="px-2 py-1 border rounded-md w-10/12 text-grey-darkest @error('birthday') border-red-500 @enderror"
                        type="date" name="birthday" id="birthday"
                        value="{{ $user->profile->birthday ?? old('birthday') }}">
                    @error('birthday')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 text-lg uppercase text-grey-darkest" for="password">Password</label>
                    <input
                        class="px-2 py-1 border rounded-md w-10/12 text-grey-darkest @error('email') border-red-500 @enderror"
                        type="password" name="password" id="password">
                    @error('password')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 text-lg uppercase text-grey-darkest" for="confirm_password">Confirm
                        Password</label>
                    <input class="w-10/12 px-2 py-1 border rounded-md text-grey-darkest" type="password"
                        wire:model="password_confirmation" name="password_confirmation" id="password_confirmation">
                </div>
                <input type="file" name="image" id="image">
                <button class="px-5 py-2 text-white bg-green-500 rounded-lg" type="submit">Save</button>
            </form>
        </div>
    </div>
@endsection
