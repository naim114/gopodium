<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');
            $table->double('score')->nullable();
            $table->string('note')->default('')->nullable();

            // foreign key
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('athlete_id')->unsigned()->nullable();
            $table->foreign('athlete_id')->references('id')->on('athletes')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('team_id')->unsigned()->nullable();
            $table->foreign('team_id')->references('id')->on('teams')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('participants');
    }
}