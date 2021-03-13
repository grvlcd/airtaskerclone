<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->user();
        $user->comments()->create([
            'body' => $request->body,
            'task_id' => $request->task_id,
        ]);
        return redirect()->route('tasks.show', $request->task_id);
    }
}
