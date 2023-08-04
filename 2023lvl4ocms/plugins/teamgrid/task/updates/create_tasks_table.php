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

            $table->integer('user_id')->nullable();
            $table->text('user_name')->nullable();
            $table->integer('project_id')->nullable();
            $table->text('project_name')->nullable();

            $table->date('planned_start')->nullable();
            $table->date('planned_end')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->time('planned_time')->nullable();

            $table->text('tags')->nullable();
            $table->text('description')->nullable();

            $table->boolean('is_done')->default(false)->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teamgrid_task_tasks');
    }
}
