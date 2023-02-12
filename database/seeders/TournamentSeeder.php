<?php

namespace Database\Seeders;

use App\Models\StandingType;
use App\Models\Tournament;
use App\Models\TournamentType;
use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TournamentType::create([
            'name' => 'Track & Field',
            'description' => 'Track & Field Tournament',
        ]);

        TournamentType::create([
            'name' => 'Cross Country',
            'description' => 'Cross Country Tournament',
        ]);

        StandingType::create([
            'name' => 'Count First to Eigth Place Points Only',
            'description' => 'Points of 1st to 8th Place only count',
        ]);

        StandingType::create([
            'name' => 'Count First to Third Place Points Only',
            'description' => 'Points of 1st to 3rd Place only count',
        ]);

        StandingType::create([
            'name' => 'Count Gold Medal Only',
            'description' => 'Who got the most golds win',
        ]);

        Tournament::create([
            'name' => 'KEJOHANAN SUKAN TAHUNAN 2022',
            'code' => 'CUP001',
            'organizer' => 'GoPodium',
            'start_at' => '2023-02-11',
            'owner_id' => '3',
            'plan_id' => '2',
            'tournament_type_id' => '1',
            'standing_type_id' => '1',
        ]);
    }
}