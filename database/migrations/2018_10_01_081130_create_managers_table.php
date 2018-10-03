<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);

        Schema::create('managers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_username');
            $table->string('name');
            $table->string('surname');
            $table->timestamps();
        });

        Schema::table('managers', function(Blueprint $table)
        {
            $table->foreign('user_username')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('managers');
    }
}
