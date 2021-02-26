<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TaskForm extends Component
{
    public $title;
    public $description;
    public $rate;
    public $desired_date;
    public $show = false;

    protected $rules = [
        'title' => ['required', 'max:255'],
        'description' => ['required'],
        'rate' => ['required', 'numeric'],
        'desired_date' => ['required', 'after:today'],
    ];

    public function onSubmit() {
        $this->validate();
        Auth::user()->tasks()->create([
            'title' => $this->title,
            'description' => $this->description,
            'rate' => $this->rate,
            'status' => 'open',
            'desired_date' => $this->desired_date
        ]);
        $this->clearFields();
        $this->emit('refreshParent', $this->show);
    }

    public function closeModal() {
        $this->emit('refreshParent', $this->show);
    }

    public function clearFields() {
        $this->reset('title');
        $this->reset('description');
        $this->reset('rate');
        $this->reset('desired_date');
    }

    public function render()
    {
        return view('livewire.task-form');
    }
}
