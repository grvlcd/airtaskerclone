@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($tasks as $task)
            <x-task-card :task="$task" />
        @endforeach
    </div>
@endsection
