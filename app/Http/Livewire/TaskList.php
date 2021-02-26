<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskList extends Component
{
    public $tasks; 
    public $selectedTask;
    public $show = false;

    protected $listeners = [
        'task' => 'getTaskEmitted',
        'refreshParent',
    ];

    public function refreshParent($show) {
        $this->tasks = Task::open()->with('user')->latest()->get();
        $this->show = $show;
    }

    public function getTaskEmitted($task) {
        $this->selectedTask = 
        Task::where('id', '=', $task)->get()->first();
    }

    public function mount() {
        $this->tasks = Task::open()->with('user')->latest()->get();
    }

    public function render()
    {
        return view('livewire.task-list');
    }
}
