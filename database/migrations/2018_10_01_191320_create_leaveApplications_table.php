<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaveApplications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id')->unsigned();
            $table->string('leave_type');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->integer('period');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('leaveApplications', function(Blueprint $table)
        {
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('leave_type')->references('leave_type')->on('leaveTypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaveApplications');
    }
}
