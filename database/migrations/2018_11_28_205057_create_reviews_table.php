<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reviews', function (Blueprint $table) {
        $table->increments('id');
        $table->string('author');
        $table->foreign('author')->references('username')->on('users');
        $table->string('review_text', 1000000);
        $table->unsignedInteger('helpful')->default(0);
        $table->unsignedInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users');
        $table->unsignedInteger('recipe_id');
        $table->foreign('recipe_id')->references('id')->on('recipes');
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
        Schema::dropIfExists('reviews');
    }
}
