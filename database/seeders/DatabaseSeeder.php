<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->count(10)->create();
        $tasks = Task::factory()->count(20)->make()
        ->each(function($task) use($users) {
            $task->user_id = $users->random()->id;
            $task->save();
        });
    }
}
