<?php

namespace Database\Seeders;

use App\Models\Athlete;
use App\Models\StandingType;
use App\Models\Team;
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

        Team::create([
            'name' => 'TEAM A',
            'category' => '001',
            'tournament_id' => '1',
        ]);

        Team::create([
            'name' => 'TEAM B',
            'category' => '001',
            'tournament_id' => '1',
        ]);

        Team::create([
            'name' => 'TEAM C',
            'category' => '001',
            'tournament_id' => '1',
        ]);

        Athlete::create([
            'name' => 'Mat',
            'team_id' => '1',
        ]);

        Athlete::create([
            'name' => 'Bo',
            'team_id' => '1',
        ]);

        Athlete::create([
            'name' => 'Tak',
            'team_id' => '1',
        ]);

        Athlete::create([
            'name' => 'Ali',
            'team_id' => '2',
        ]);

        Athlete::create([
            'name' => 'Abu',
            'team_id' => '2',
        ]);

        Athlete::create([
            'name' => 'Kareem',
            'team_id' => '2',
        ]);

        Athlete::create([
            'name' => 'Mahmoud',
            'team_id' => '3',
        ]);

        Athlete::create([
            'name' => 'Hakeem',
            'team_id' => '3',
        ]);

        Athlete::create([
            'name' => 'Yusuf',
            'team_id' => '3',
        ]);
    }
}