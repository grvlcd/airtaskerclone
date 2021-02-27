<div x-data="{show: @entangle('show')}">
    <button class="p-3 mt-3 text-white bg-pink-500" type="button" x-on:click="show = true">Post a Task</button>
    <div class="" x-show="show">
        @livewire('task-form')
    </div>
    <div class="grid grid-cols-4 mt-4">
        <div class="h-auto">
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
</div>
