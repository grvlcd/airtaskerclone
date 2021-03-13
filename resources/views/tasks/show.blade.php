@extends('layouts.app')

@section('content')
<div class="w-full">
    <x-task-detail :task="$task" />
</div>
@endsection