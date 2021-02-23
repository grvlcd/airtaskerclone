<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
        return view('tasks.index');
    }

    public function store(TaskRequest $request) {
        $task = $request->user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'rate' => $request->rate,
            'status' => 'open',
            'desired_date' => $request->desired_date
        ]);

        return redirect()->route('tasks.index')->withSuccess('Task posted!');
    }

    public function create() {
        return view('tasks.create');
    }

    public function show(Task $task) {
        return view('tasks.show')->with([
            'task' => $task,
        ]);
    }

    public function edit(Task $task) {
        return view('tasks.edit')->with([
            'task' => $task,
        ]);
    }

    public function update(TaskRequest $request, Task $task) {
        $this->authorize('update', $task);
        $task->update($request->all());
        
    }

    public function destroy(Task $task) {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect()->route('tasks.index')->withSuccess("{$task->title} deleted!");
    }
}
