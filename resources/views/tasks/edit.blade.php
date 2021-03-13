@extends('layouts.app')

@section('content')
<div class="flex items-center w-4/6 m-auto bg-teal-lighter">
    <div class="w-full p-8 m-4 bg-white rounded shadow-lg">
        <h1 class="block w-full mb-6 text-2xl text-center uppercase text-grey-darkest">Post a Task</h1>
        <form class="mb-4" action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="flex flex-col mb-4">
                <label class="mb-2 text-lg font-bold uppercase text-grey-darkest" for="title">Title</label>
                <input class="px-3 py-2 border text-grey-darkest" type="text" name="title" id="title" value="{{ $task->id ?? old('title') }}">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 text-lg font-bold uppercase text-grey-darkest" for="description">Description</label>
                <textarea class="px-3 py-2 border text-grey-darkest" rows="6" name="description" id="description">{{ $task->description ?? old('description') }}</textarea>
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 text-lg font-bold uppercase text-grey-darkest" for="rate">Rate</label>
                <input class="px-3 py-2 border text-grey-darkest" type="number" min="10" step="1" name="rate" id="rate" value="{{ $task->rate ?? old('rate') }}">
            </div>
            <div class="flex flex-col mb-6">
                <label class="mb-2 text-lg font-bold uppercase text-grey-darkest" for="desired_data">Date
                    Execution</label>

                <input class="px-3 py-2 border text-grey-darkest" type="date" value="{{$task->desired_date->format('Y-m-d')}}" name="desired_date" id="desired_date">
            </div>
            <button class="block px-5 py-2 mx-auto text-lg text-white uppercase bg-indigo-400 rounded bg-teal hover:bg-teal-dark" type="submit">Post</button>
        </form>
    </div>
</div>
@endsection