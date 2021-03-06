<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title', 250);
          $table->string('author');
          $table->foreign('author')->references('username')->on('users');
          $table->string('image');
          $table->string('description', 500);
          $table->string('prep_time', 10);
          $table->string('cook_time', 10);
          $table->longText('ingredients');
          $table->longText('instructions');
          $table->unsignedInteger('upvotes')->default(0);
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
        Schema::dropIfExists('recipes');
    }
}
