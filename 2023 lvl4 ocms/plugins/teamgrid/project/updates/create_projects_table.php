<?php namespace Teamgrid\Project\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('teamgrid_project_projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('project_manager_id')->nullable();

            $table->dateTime('due_date')->nullable();

            $table->enum('accounting', ['disabled', 'service_hourly_rate','person_hourly_rate','hourly_rate' ])->nullable();
            $table->integer('hourly_rate_price')->nullable();

            $table->enum('budget', ['disabled', 'total_hours','total_fees','hours_per_month','fees_per_month' ])->nullable();

            $table->boolean('is_done')->nullable()->default(false)->nullable();
                    
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teamgrid_project_projects');
    }
}
