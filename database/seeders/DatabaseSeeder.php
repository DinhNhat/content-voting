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
        User::factory()->create([
            'name' => 'Nhat Dinh Nguyen',
            'email' => 'nhat@yahoo.ca',
            'password' => 'nhat123#'
        ]);

        User::factory()->create([
            'name' => 'Kitty',
            'email' => 'kitty@yahoo.ca',
            'password' => 'kitty123#'
        ]);

        User::factory()->create([
            'name' => 'Ngoc Minh',
            'email' => 'minh@gmail.com',
            'password' => 'minh123#'
        ]);

        User::factory()->create([
            'name' => 'Duc Cong Nguyen',
            'email' => 'duccong@gmail.com',
            'password' => 'cong123#'
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

        Idea::factory()->count(100)->create();

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
