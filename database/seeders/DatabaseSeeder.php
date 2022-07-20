<?php

namespace Database\Seeders;

use App\Models\Inflow;
use App\Models\Outflow;
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
