@extends('layouts.app')

@section('content')
    <div class="p-6 m-auto mt-10 tracking-wide bg-white border-2 border-gray-300 rounded-md shadow-lg max-w-7xl top-5">
        <h1 class="mb-4 text-2xl text-blue-500">Edit Certificates</h1>
        <div class="grid grid-cols-2">
            <div class="flex-col p-3">
                @foreach ($portfolio->certificates as $certificate)
                    <div class="flex flex-row w-full p-3 mb-2 bg-white border-2 border-gray-300 rounded-md shadow-lg">
                        <h1 class="flex-grow-0 text-lg">{{ $certificate->title }}</h1>
                        <div class="flex-grow"></div>
                        <a class="mr-2 text-green-400" href="#">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form class="flex-grow-0 mb-2" action="{{ route('portfolio.certificate.destroy', $certificate) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn button-transparent"><i
                                    class="text-red-500 fas fa-trash"></i></button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="p-3">
                <form method="post" action="{{ route('portfolio.certificate.store') }}">
                    @csrf
                    <div class="flex flex-col mb-4">
                        <label class="mb-2 text-lg font-bold uppercase text-grey-darkest" for="title">Title</label>
                        <input class="px-3 py-2 border text-grey-darkest @error('title') border-red-500 @enderror"
                            type="text" name="title" id="title" value="{{ old('title') }}">
                        @error('title')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-4">
                        <label class="mb-2 text-lg font-bold uppercase text-grey-darkest"
                            for="description">Description</label>
                        <textarea class="px-3 py-2 border text-grey-darkest" rows="6" name="description"
                            id="description">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <button
                        class="block px-5 py-2 text-lg text-white uppercase bg-green-400 rounded bg-teal hover:bg-teal-dark"
                        type="submit">Add Certificate</button>
                </form>
            </div>
        </div>
    </div>
@endsection
