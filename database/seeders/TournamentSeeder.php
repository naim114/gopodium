<?php

namespace Database\Seeders;

use App\Models\Athlete;
use App\Models\Event;
use App\Models\EventType;
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
        // tournament type
        TournamentType::create([
            'name' => 'Track & Field',
            'description' => 'Track & Field Tournament',
        ]);

        TournamentType::create([
            'name' => 'Cross Country',
            'description' => 'Cross Country Tournament',
        ]);

        // standing type
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

        // tournament
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

        // team
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

        // athlete
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

        // event type
        EventType::create([
            'name' => 'Individual Matchup',
            'description' => 'Two person versus each other',
        ]);

        EventType::create([
            'name' => 'Team Matchup',
            'description' => 'Two team versus each other',
        ]);

        EventType::create([
            'name' => 'Individual Heat',
            'description' => 'More than two person versus each other',
        ]);

        EventType::create([
            'name' => 'Team Heat',
            'description' => 'More than two team versus each other',
        ]);

        // event
        // ind matchup
        Event::create([
            'name' => 'Ping Pong Men Individual',
            'code' => 'PP001',
            'category' => 'Men',
            'round' => 'Semi-Final',
            'event_type_id' => '1',
        ]);

        Event::create([
            'name' => 'Ping Pong Men Individual',
            'code' => 'PP002',
            'category' => 'Men',
            'round' => 'Semi-Final',
            'event_type_id' => '1',
        ]);

        Event::create([
            'name' => 'Ping Pong Men Individual',
            'code' => 'PP003',
            'category' => 'Men',
            'round' => 'Final',
            'event_type_id' => '1',
        ]);

        // team matchup
        Event::create([
            'name' => 'Badminton Women Double',
            'code' => 'BM001',
            'category' => 'Women',
            'round' => 'Semi-Final',
            'event_type_id' => '2',
        ]);

        Event::create([
            'name' => 'Badminton Women Double',
            'code' => 'BM002',
            'category' => 'Women',
            'round' => 'Semi-Final',
            'event_type_id' => '2',
        ]);

        Event::create([
            'name' => 'Badminton Women Double',
            'code' => 'BM001',
            'category' => 'Women',
            'round' => 'Final',
            'event_type_id' => '2',
        ]);

        // ind heat
        Event::create([
            'name' => '100M Men',
            'code' => 'TR001',
            'category' => 'Men',
            'round' => 'Final',
            'event_type_id' => '3',
        ]);

        // team heat
        Event::create([
            'name' => '4 X 200M Women',
            'code' => 'TR002',
            'category' => 'Women',
            'round' => 'Final',
            'event_type_id' => '4',
        ]);
    }
}