<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskCard extends Component
{
    public $task;

    public function showTask() {
        $this->emit('task', $this->task->id);
    }

    public function render()
    {
        return view('livewire.task-card');
    }
}
