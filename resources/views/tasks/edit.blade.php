@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="table text-light">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $task->title ?? old('title') }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea rows="6" name="description"
                    class="form-control resize">{{ $task->description ?? old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="rate">Rate</label>
                <input type="number" min="10" step="1" class="form-control" name="rate"
                    value="{{ $task->rate ?? old('rate') }}">
            </div>
            <div class="form-group">
                <label for="datetime">Desired Date</label>
                <input type="date" class="form-control" name="desired_date"
                    value="{{ $task->desired_date ?? old('date') }}">
            </div>
            <button type="submit" class="btn btn-success">
                Submit
            </button>
        </form>
    </div>
@endsection
