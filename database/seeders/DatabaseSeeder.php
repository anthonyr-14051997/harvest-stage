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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $categories = Category::factory(20)->create();
        User::factory(10)->create();
        Inflow::factory(100)->create();
        Outflow::factory(50)->create();

        Inflow::all()->each(function ($inflow) use ($categories) {
            $inflow->categories()->attach(
                $categories->random(rand(1, 20))->pluck('id')->toArray()
            );
        });

        Outflow::all()->each(function ($outflow) use ($categories) {
            $outflow->categories()->attach(
                $categories->random(rand(1, 20))->pluck('id')->toArray()
            );
        });

    }
}
