<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::open()->with('user')->get();
        return view('tasks.index')->with([
            'tasks' => $tasks,
        ]);
    }

    public function show(Task $task) {
        return view('tasks.show')->with([
            'task' => $task,
        ]);
    }
}
