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
            
            $table->integer('user_id');
            $table->integer('task_id');

            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            
            $table->string('total_time')->nullable();
            $table->boolean('is_done')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teamgrid_timeentry_time_entries');
    }
}
