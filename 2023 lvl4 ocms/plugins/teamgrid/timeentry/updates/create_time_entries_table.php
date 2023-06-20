<?php namespace Teamgrid\TimeEntry\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTimeEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('teamgrid_timeentry_time_entries', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            
            $table->integer('userID')->index();
            $table->integer('taskID')->nullable();

            $table->dateTime('startTime');
            $table->dateTime('endTime')->nullable();
            
            $table->boolean('done')->default(false);
            $table->integer('totalTime')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teamgrid_timeentry_time_entries');
    }
}
