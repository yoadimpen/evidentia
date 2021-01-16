<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingPlanningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_planning', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comittee_id')->nullable(true);
            $table->string('title');
            $table->timestamp('datetime');
            $table->string('place');
            $table->enum('type',['ORDINARY','EXTRAORDINARY']);
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
        Schema::dropIfExists('meeting_planning');
    }
}
