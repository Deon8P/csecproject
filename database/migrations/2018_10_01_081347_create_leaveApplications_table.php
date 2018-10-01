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
            $table->integer('emp_id')->unsigned();
            $table->string('leave_type');
            $table->integer('period');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('leaveApplications', function(Blueprint $table)
        {
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
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
