<div class="row mb-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header-pills">
                <h5 class="card-header">{{ $task->title }}</h5>
            </div>
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <h6 class="text-success text-uppercase">{{ $task->status }}</h6>
                    <h4 class="text-right">${{ $task->rate }}</h4>
                </div>
                <div class="">
                    Posted by: {{ $task->user->name }}
                </div>
                <div class="d-flex flex-column mb-3">
                    <div>
                        <i class="fa fa-globe"></i> 2352 Carolyns Circle
                    </div>
                    <div>
                        <i class="far fa-calendar-alt"></i>
                        {{ $task->desired_date->format('D, d M') }}
                    </div>
                    <div>
                        <i class="far fa-calendar-plus"></i>
                        {{ $task->created_at->diffForHumans() }}
                    </div>
                </div>
                <p class="card-text">{{ $task->description }}</p>

            </div>
        </div>
    </div>
</div>
