<div class="grid grid-cols-4 mt-4">
    <div class="">
        @foreach ($tasks as $task)
            @livewire('task-card', ['task' => $task], key($task->id))
        @endforeach
    </div>
    <div class="col-span-3">
        @if ($selectedTask != null)
            <x-task-detail :task="$selectedTask"></x-task-detail>
        @endif
    </div>
</div>
