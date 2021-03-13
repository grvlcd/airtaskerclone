<div class="sticky max-w-5xl p-6 m-auto mt-4 tracking-wide bg-white border-2 border-gray-300 rounded-md shadow-lg top-5">
    <h4 class="flex items-center justify-center text-lg tracking-wide text-white uppercase bg-green-400 w-28 rounded-2xl">
        {{ $task->status }}
    </h4>
    <div class="">
        <div class="flex flex-row">
            <h5 class="flex items-center justify-center flex-grow-0 w-auto h-24 text-2xl">{{ $task->title }}</h5>
            <h4 class="flex-grow"></h4>
            <h4 class="flex items-center justify-center flex-grow-0 w-24 h-24 text-xl text-white bg-green-500 rounded-full">
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
    <div>
        <h1 class="text-indigo-400 underline">Offers</h1>
        <div class="flex flex-col-reverse mt-4 mb-4">
            @foreach ($task->comments as $comment)
            <div class="p-3 m-1 bg-gray-100 rounded-2xl">
                <div class="flex flex-row items-center justify-start">
                    @if (isset($comment->user->profile->path))
                    <img class="w-8 h-8 mr-2 rounded-full" src="{{ asset('images/' . $comment->user->profile->path) }}">
                    @else
                    <img class="w-8 h-8 mr-2 rounded-full" src="https://i.pinimg.com/originals/df/28/37/df28378dbe3bc59d8e5d3646ade310b8.jpg">
                    @endif
                    <p class="text-sm font-medium text-grey-darkest">{{ $comment->user->name }}</p>
                </div>
                <small class="text-xs text-grey-dark ">{{ $comment->body }}</small>
            </div>
            @endforeach
        </div>
        <form action="{{route('comments.store')}}" method="POST">
            @csrf
            <div class="relative w-full text-gray-600 focus-within:text-gray-400">
                <input type="hidden" value="{{$task->id}}" name="task_id" />
                <input type="text" name="body" class="w-full py-2 pl-10 text-sm text-black bg-gray-100 border rounded-md" placeholder="Write a comment..." autocomplete="off">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <button type="submit" class="p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>