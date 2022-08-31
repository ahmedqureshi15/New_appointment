<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnBoardingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('on_boardings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('program')->nullable();
            $table->string('is_approved')->nullable();
            $table->string('is_interview_booked')->nullable();
            $table->string('alert')->nullable();
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
        Schema::dropIfExists('on_boardings');
    }
}
