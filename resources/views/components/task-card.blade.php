<div class="row mb-2">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <a class="font-weight-bold text-decoration-none"
                        href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
                    <h6 class="text-right">${{ $task->rate }}</h6>
                </div>
                <i class="fa fa-globe"></i> 2352 Carolyns Circle
                <p class="card-text">
                    <i class="far fa-calendar-alt"></i>
                    {{ $task->desired_date->format('D, d M') }}
                </p>
            </div>
            @can(['delete', 'update'], $task)
                <div class="flex">

                    <form class="d-inline" action="{{ route('tasks.destroy', $task->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn  button-transparent"><i
                                class="fas fa-trash text-danger"></i></button>
                    </form>
                    <a class="text-success" href="{{ route('tasks.edit', $task->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </div>
            @endcan
            <div class="d-flex flex-row justify-content-around">
                <p class="text-uppercase text-success">{{ $task->status }}</p>
                <p>{{ $task->created_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
</div>
