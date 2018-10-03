<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emp_username');
            $table->string('leave_type');
            $table->date('startDate');
            $table->date('endDate');
            $table->integer('period');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('leaves', function(Blueprint $table)
        {
            $table->foreign('emp_username')->references('user_username')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('leave_type')->references('leave_type')->on('leave_types')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
