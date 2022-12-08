<?php

namespace Database\Seeders;

use App\Models\Category;
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
        User::factory()->count(20)->create();

        Idea::factory()->count(100)->create();

        Category::factory()->create(['name' => 'Category 1']);
        Category::factory()->create(['name' => 'Category 2']);
        Category::factory()->create(['name' => 'Category 3']);
        Category::factory()->create(['name' => 'Category 4']);

        Status::factory()->create(['name' => 'Open']);
        Status::factory()->create(['name' => 'Considering']);
        Status::factory()->create(['name' => 'In Progress']);
        Status::factory()->create(['name' => 'Implemented']);
        Status::factory()->create(['name' => 'Closed']);

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
    }
}
