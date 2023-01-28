<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Nhat',
            'email' => 'nhat@yahoo.ca',
            'password' => '$2y$10$6q4ajxbVmHTQoA4yeSfZhO8h0BZQC3oGDsO1nnut55A5w5wJYLqdi'
        ]);

        User::factory()->create([
            'name' => 'Kitty',
            'email' => 'kitty@yahoo.ca',
            'password' => '$2y$10$0vSiaDVbASHyCliEojcx2eoVDWC3LsUmTklck5r9aykYO9B1Zda5G'
        ]);

        User::factory()->create([
            'name' => 'Ngoc Minh',
            'email' => 'minh_cho@gmail.com',
            'password' => '$2y$10$iWMEcG5z2beSCStC8GCc7u3a0YugMonBVocVXisxPHNZUg/nqz756'
        ]);

        User::factory()->create([
            'name' => 'Duc Cong Nguyen',
            'email' => 'duccong@gmail.com',
            'password' => '$2y$10$TL/dVvU/.Dbu9cYAUSYyQOkhaZkZWV8feAm1ctT0iWUBkdaXyFcB6'
        ]);

        User::factory()->count(16)->create();

        Category::factory()->create(['name' => 'Category 1']);
        Category::factory()->create(['name' => 'Category 2']);
        Category::factory()->create(['name' => 'Category 3']);
        Category::factory()->create(['name' => 'Category 4']);

        Status::factory()->create(['name' => 'Open']);
        Status::factory()->create(['name' => 'Considering']);
        Status::factory()->create(['name' => 'In Progress']);
        Status::factory()->create(['name' => 'Implemented']);
        Status::factory()->create(['name' => 'Closed']);

        Idea::factory(100)->existing()->create();

        // Generate unique votes. Ensure idea_id and user_id are unique for each row
        foreach (range(1, 20) as $userId) {
            foreach (range(1, 100) as $ideaId) {
                if ($ideaId % 2 === 0) {
                    Vote::factory()->create([
                        'user_id' => $userId,
                        'idea_id' => $ideaId
                    ]);
                }
            }
        }

        // Generate comments for ideas
        foreach (Idea::all() as $idea) {
            Comment::factory(5)->existing()->create(['idea_id' => $idea->id]);
        }

        for ($i = 1; $i <= 15; $i++) {
            Idea::factory()
                ->hasComments(100)
                ->create();
        }
    }
}
