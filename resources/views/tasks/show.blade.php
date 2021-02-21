@extends('layouts.app')

@section('content')
    <div class="container">
        <x-task-detail :task="$task" />
    </div>
@endsection
