<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Http\Request;
class TaskComment extends Component
{
    public $comments = array();
    public $task_id;
    public $body;

    protected $listeners = [
        'task' => 'getTaskEmitted'
    ];

    public function mount() {
        $this->comments = Comment::where('task_id', '=', $this->task_id)->get();
    }

    public function getTaskEmitted($task) {
        $this->comments = Comment::where('task_id', '=', $task)->get();
    }

    public function onSubmit(Request $request) {
        $comment = $request->user()->comments()->create([
            'body' => $this->body,
            'task_id' => $this->task_id,
        ]);
        $this->comments = "";
        $this->comments = Comment::where('task_id', '=', $this->task_id)->get();
        $this->reset('body');
    }

    public function render()
    {
        return view('livewire.task-comment');
    }
}
