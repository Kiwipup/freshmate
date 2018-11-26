<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restocks', function (Blueprint $table) {
          $table->increments('id');
          $table->string('item_name', 250);
          $table->string('description', 250)->nullable();
          $table->unsignedInteger('amount');
          $table->unsignedInteger('user_id');
          $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('restocks');
    }
}
