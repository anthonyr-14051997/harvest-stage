<?php

namespace Database\Seeders;

use App\Models\Flow;
use App\Models\Salary;
use App\Models\Category;
use App\Models\User;
use App\Models\PercentageUrssaf;
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

        $categories = Category::factory(20)->create();
        
        User::factory(10)->create();
        Flow::factory(500)->create();

        Flow::all()->each(function ($flow) use ($categories) {
            $flow->categories()->attach(
                $categories->random(rand(1, 20))->pluck('id')->toArray()
            );
        });

        PercentageUrssaf::create([
            'name' => 'achat revente hébergement', 
            'percentage' => '12.8'
        ]);
        PercentageUrssaf::create([
            'name' => 'profession libérale non reglementée', 
            'percentage' => '22'
        ]);
        PercentageUrssaf::create([
            'name' => 'profession libérale', 
            'percentage' => '22.2'
        ]);

    }
}
