<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Task extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->nullable();
            $table->foreignId('record_id')->nullable();
            $table->string('task_description')->nullable();
            $table->enum('status', ['in_process', 'done'])->nullable()->default('in_process');
            $table->string('activity')->nullable()->default(null);
            $table->string('total_time')->nullable()->default(null);
            $table->string('alarm')->nullable()->default(null);
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
        Schema::dropIfExists('task');
    }
}
