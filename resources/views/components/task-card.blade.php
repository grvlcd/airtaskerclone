<div class="h-full max-w-sm p-6 tracking-wide bg-white border-2 border-gray-300 rounded-md shadow-lg hover:shadow-2xl">
    <div class="card-body">
        <div class="flex flex-row">
            <a class="flex-grow-0 mb-2 text-2xl" role="button">{{ $task->title }}</a>
            <div class="flex-grow"></div>
            <h6 class="flex-grow-0 text-2xl">${{ $task->rate }}</h6>
        </div>
        <i class="fa fa-globe"></i> 2352 Carolyns Circle
        <p class="mb-2">
            <i class="far fa-calendar-alt"></i>
            {{ $task->desired_date->format('D, d M') }}
        </p>
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
    <div class="flex flex-row">
        <a href="{{route('tasks.show', $task->id)}}" class="flex-grow-0 text-green-500 uppercase">View</a>
        <div class="flex-grow"></div>
        <p class="flex-grow-0">{{ $task->created_at->diffForHumans() }}</p>
    </div>
</div>