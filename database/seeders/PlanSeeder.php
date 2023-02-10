<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Rookie',
            'price' => 2000,
            'team_limit' => 3,
            'athlete_limit' => 5,
            'event_limit' => 10,
            'invite' => false,
            'personalization' => false,
        ]);

        Plan::create([
            'name' => 'All-Star',
            'price' => 3500,
            'team_limit' => 4,
            'athlete_limit' => 20,
            'event_limit' => 20,
            'invite' => true,
            'personalization' => true,
        ]);

        Plan::create([
            'name' => 'MVP',
            'price' => 5000,
            'team_limit' => 500,
            'athlete_limit' => 500,
            'event_limit' => 500,
            'invite' => true,
            'personalization' => true,
        ]);
    }
}