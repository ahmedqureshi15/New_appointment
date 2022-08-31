<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailableAppointments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_appointments', function (Blueprint $table) {
            $table->id();
            $table->integer('locationId');
            $table->string('startTimestamp');
            $table->string('endTimestamp');
            $table->string('active');
            $table->integer('duration');
            $table->string('remoteInd');
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
        Schema::dropIfExists('available_appointments');
    }
}
