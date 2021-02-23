<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
class TaskComment extends Component
{
    public $comments;

    public function mount($comments) {
        $this->comments = $comments;
    }

    public function render()
    {
        return view('livewire.task-comment');
    }
}
