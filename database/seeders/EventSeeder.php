<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\EventType;
use App\Models\Participant;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // event type
        EventType::create([
            'name' => 'Individual Matchup',
            'description' => 'Two person versus each other',
        ]);

        EventType::create([
            'name' => 'Team Matchup',
            'description' => 'Two team versus each other with individuals',
        ]);

        EventType::create([
            'name' => 'Individual Heat',
            'description' => 'More than two person versus each other',
        ]);

        EventType::create([
            'name' => 'Team Heat',
            'description' => 'More than two team versus each other',
        ]);

        // EventType::create([
        //     'name' => 'Team Matchup (No Individuals)',
        //     'description' => 'Two team versus each other with no individuals',
        // ]);

        // event & participant
        // ind matchup
        // 1
        Event::create([
            'name' => 'Ping Pong Men Individual',
            'code' => 'PP001',
            'category' => 'Men',
            'round' => 'Semi-Final',
            'event_type_id' => '1',
            'tournament_id' => '1',
            'start_at' => '2023-02-11 08:30:00',
            'end_at' => '2023-02-11 09:00:00',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '1',
            'athlete_id' => '1',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '1',
            'athlete_id' => '5',
        ]);

        // 2
        Event::create([
            'name' => 'Ping Pong Men Individual',
            'code' => 'PP002',
            'category' => 'Men',
            'round' => 'Semi-Final',
            'event_type_id' => '1',
            'tournament_id' => '1',
            'start_at' => '2023-02-11 09:00:00',
            'end_at' => '2023-02-11 09:30:00',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '2',
            'athlete_id' => '6',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '2',
            'athlete_id' => '9',
        ]);

        // 3
        Event::create([
            'name' => 'Ping Pong Men Individual',
            'code' => 'PP003',
            'category' => 'Men',
            'round' => 'Final',
            'event_type_id' => '1',
            'tournament_id' => '1',
            'start_at' => '2023-02-12 08:30:00',
            'end_at' => '2023-02-12 09:00:00',
        ]);

        // team matchup
        // 4
        Event::create([
            'name' => 'Badminton Women Double',
            'code' => 'BM001',
            'category' => 'Women',
            'round' => 'Semi-Final',
            'event_type_id' => '2',
            'tournament_id' => '1',
            'start_at' => '2023-02-11 08:30:00',
            'end_at' => '2023-02-11 09:00:00',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '4',
            'athlete_id' => '2',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '4',
            'athlete_id' => '3',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '4',
            'athlete_id' => '10',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '4',
            'athlete_id' => '11',
        ]);

        // 5
        Event::create([
            'name' => 'Badminton Women Double',
            'code' => 'BM002',
            'category' => 'Women',
            'round' => 'Semi-Final',
            'event_type_id' => '2',
            'tournament_id' => '1',
            'start_at' => '2023-02-11 09:00:00',
            'end_at' => '2023-02-11 09:30:00',
        ]);

        // 6
        Event::create([
            'name' => 'Badminton Women Double',
            'code' => 'BM001',
            'category' => 'Women',
            'round' => 'Final',
            'event_type_id' => '2',
            'tournament_id' => '1',
            'start_at' => '2023-02-12 08:30:00',
            'end_at' => '2023-02-12 09:00:00',
        ]);

        // ind heat
        // 7
        Event::create([
            'name' => '100M Men',
            'code' => 'TR001',
            'category' => 'Men',
            'round' => 'Final',
            'event_type_id' => '3',
            'tournament_id' => '1',
            'start_at' => '2023-02-11 10:00:00',
            'end_at' => '2023-02-11 10:30:00',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '7',
            'athlete_id' => '1',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '7',
            'athlete_id' => '2',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '7',
            'athlete_id' => '5',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '7',
            'athlete_id' => '6',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '7',
            'athlete_id' => '9',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '7',
            'athlete_id' => '10',
        ]);

        // team heat
        // 8
        Event::create([
            'name' => '4 X 200M Women',
            'code' => 'TR002',
            'category' => 'Women',
            'round' => 'Final',
            'event_type_id' => '4',
            'tournament_id' => '1',
            'start_at' => '2023-02-11 11:00:00',
            'end_at' => '2023-02-11 11:30:00',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '8',
            'athlete_id' => '1',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '8',
            'athlete_id' => '2',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '8',
            'athlete_id' => '3',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '8',
            'athlete_id' => '4',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '8',
            'athlete_id' => '5',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '8',
            'athlete_id' => '6',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '8',
            'athlete_id' => '7',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '8',
            'athlete_id' => '8',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '8',
            'athlete_id' => '9',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '8',
            'athlete_id' => '10',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '8',
            'athlete_id' => '11',
        ]);

        Participant::create([
            'mark' => '0',
            'note' => '',
            'event_id' => '8',
            'athlete_id' => '12',
        ]);
    }
}