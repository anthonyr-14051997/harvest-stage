<?php

namespace Database\Seeders;

use App\Models\Inflow;
use App\Models\Outflow;
use App\Models\Salary;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $categories = Category::factory(5)->create();

        User::factory(10)->create()->each(function ($user) use ($categories) {
            Inflow::factory(rand(1, 3))->create([
                'user_id' => $user->id
                /* 'category_id' => ($categories->random(1)->first())->id */
            ]);
            Outflow::factory(rand(1, 3))->create([
                'user_id' => $user->id
                /* 'category_id' => ($categories->random(1)->first())->id */
            ]);
            Salary::factory(rand(1, 3))->create([
                'user_id' => $user->id
                /* 'category_id' => ($categories->random(1)->first())->id */
            ]);
        });
    }
}
