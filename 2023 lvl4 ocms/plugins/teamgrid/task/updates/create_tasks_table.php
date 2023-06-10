<?php namespace Teamgrid\Task\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('teamgrid_task_tasks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('name');

            $table->date('plannedStart')->nullable();
            $table->date('plannedEnd')->nullable();
            $table->date('dueDate')->nullable();

            $table->time('plannedTime')->nullable();
            
            $table->text('tags')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teamgrid_task_tasks');
    }
}
