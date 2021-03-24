<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventLeaderboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_leaderboards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_event_id')->constrained('game_events')->onDelete('cascade');
            $table->foreignId('event_user_id')->constrained('event_users')->onDelete('cascade');
            $table->float('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_leaderboards');
    }
}
