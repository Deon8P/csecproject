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
            $table->integer('managed_by')->unsigned();
            $table->string('name');
            $table->string('surname');
            $table->integer('leave_balance')->default(30);
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::table('employees', function(Blueprint $table)
        {
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('managed_by')->references('id')->on('managers')->onDelete('cascade');
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
