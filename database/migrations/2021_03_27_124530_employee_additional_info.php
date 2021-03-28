<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeAdditionalInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_additional_info', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->nullable();
            $table->integer('education')->nullable();
            $table->enum('marial_status', ['Married', 'Single', 'Divorced'])->nullable()->default('Single');
            $table->integer('monthly_income')->nullable();
            $table->integer('environment_satisfaction')->nullable();
            $table->integer('training_times_last_year')->nullable();
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
        Schema::dropIfExists('employee_additional_info');
    }
}
