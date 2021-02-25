<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Portfolio;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Certificate;
use App\Models\Education;


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

        $profiles = Profile::factory(10)->make()
        ->each(function($profile) use($users) {
            $profile->user_id = $users->random()->id;
            $profile->save();
        });

        $portfolios = Portfolio::factory(10)->make()
        ->each(function($portfolio) use($users) {
            $portfolio->user_id = $users->random()->id;
            $portfolio->save();

            Skill::factory()->create([
                'portfolio_id' => $portfolio->id,
            ]);

            Experience::factory()->create([
                'portfolio_id' => $portfolio->id,
            ]);

            Education::factory()->create([
                'portfolio_id' => $portfolio->id,
            ]);

            Certificate::factory()->create([
                'portfolio_id' => $portfolio->id,
            ]);
        });

        $comments = Comment::factory()->count(40)->make()
            ->each(function($comment) use($users, $tasks) {
                $comment->user_id = $users->random()->id;
                $comment->task_id = $tasks->random()->id;
                $comment->save();
        });
    }
}
