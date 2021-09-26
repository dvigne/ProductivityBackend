<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Team::factory()->has(User::factory()->count(1), 'members')
                       ->has(Task::factory()
                        ->has(Comment::factory()->count(10))
                        ->count(50))
                       ->create();
        // Team::factory(1)->create()->each(function($team) {
        //   $team->members()->create();
        //   $team->tasks()
        // });
        // $user = Team::first()->members()->create();

    }
}
