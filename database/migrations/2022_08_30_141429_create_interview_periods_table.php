<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_periods', function (Blueprint $table) {
            $table->id();

            $table->foreignId('programme_id')->constrained();
            $table->string('timePeriod');
            $table->string('timeSlot');
            $table->date('date');
            $table->string('venue');

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
        Schema::dropIfExists('interview_periods');
    }
}
