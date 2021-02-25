<div class="sticky max-w-5xl p-6 mt-4 tracking-wide bg-white border-2 border-gray-300 rounded-md shadow-lg top-5">
    <h4
        class="flex items-center justify-center w-24 text-lg tracking-wide text-white uppercase bg-green-400 rounded-2xl">
        {{ $task->status }}</h4>
    <div class="">
        <div class="flex flex-row">
            <h5 class="flex items-center justify-center flex-grow-0 w-auto h-24 text-2xl">{{ $task->title }}</h5>
            <h4 class="flex-grow"></h4>
            <h4
                class="flex items-center justify-center flex-grow-0 w-24 h-24 text-xl text-white bg-green-500 rounded-full">
                ${{ $task->rate }}</h4>
        </div>
        <div>
            <p class="mb-3">Posted by: <span class="text-lg font-semibold">{{ $task->user->name }}</span></p>
        </div>
        <div class="mb-3 d-flex flex-column">
            <div>
                <i class="text-blue-500 fa fa-globe"></i> 2352 Carolyns Circle
            </div>
            <div>
                <i class="text-red-500 far fa-calendar-alt"></i>
                {{ $task->desired_date->format('D, d M') }}
            </div>
            <div>
                <i class="text-yellow-500 far fa-calendar-plus"></i>
                {{ $task->created_at->diffForHumans() }}
            </div>
        </div>
        <p class="mb-4 text-lg text-justify">{{ $task->description }}</p>
    </div>
    @can(['delete', 'update'], $task)
        <div class="flex flex-row">
            <a class="text-green-400" href="{{ route('tasks.edit', $task->id) }}">
                <i class="fas fa-edit"></i>
            </a>
            &nbsp;&nbsp;
            <form class="flex-grow-0 mb-2" action="{{ route('tasks.destroy', $task->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn button-transparent"><i class="text-red-500 fas fa-trash"></i></button>
            </form>
        </div>
    @endcan
    @livewire('task-comment', ['task_id' => $task->id])
</div>
