@extends('layouts.app')

@section('content')
<div>
    <div class="grid grid-cols-12">
        @foreach ($tasks as $task)
        <div class="h-full col-span-3 p-3">
            <x-task-card :task="$task"></x-task-card>
        </div>
        @endforeach
    </div>
</div>
@endsection