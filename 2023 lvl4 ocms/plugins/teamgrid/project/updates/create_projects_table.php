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
            $table->integer('customerID')->nullable();
            $table->integer('projectManagerID')->nullable();

            $table->date('dueDate')->nullable();

            $table->enum('accounting', ['disabled', 'serviceHourlyRate','personHourlyRate','hourlyRate' ])->nullable();
            $table->integer('hourlyRatePrice')->nullable();

            $table->enum('budget', ['disabled', 'totalHours','totalFees','hoursPerMonth','feesPerMonth' ])->nullable();

            $table->boolean('done')->nullable()->default(false)->nullable();
                    
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teamgrid_project_projects');
    }
}
