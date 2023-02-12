<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->index();
            $table->string('organizer');
            $table->date('start_at');
            $table->string('logo_path')->nullable();

            // foregin key
            $table->integer('owner_id');
            $table->integer('plan_id');
            $table->integer('tournament_type_id');
            $table->integer('standing_type_id');

            // rules
            $table->integer('athlete_individual_event_limit')->default(3);
            $table->integer('athlete_team_event_limit')->default(3);
            $table->integer('first_place_point')->default(10);
            $table->integer('second_place_point')->default(8);
            $table->integer('third_place_point')->default(6);
            $table->integer('fourth_place_point')->default(5);
            $table->integer('fifth_place_point')->default(4);
            $table->integer('sixth_place_point')->default(3);
            $table->integer('seventh_place_point')->default(2);
            $table->integer('eigth_place_point')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournaments');
    }
}
