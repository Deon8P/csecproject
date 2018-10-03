<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);

        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_username');
            $table->string('managed_by');
            $table->string('name');
            $table->string('surname');
            $table->integer('leave_balance')->default(30);
            $table->timestamps();
        });


        Schema::table('employees', function(Blueprint $table)
        {
            $table->foreign('user_username')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('managed_by')->references('user_username')->on('managers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
