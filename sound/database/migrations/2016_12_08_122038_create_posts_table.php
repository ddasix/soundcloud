<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('track_id');
            $table->string('track_title');
            $table->string('artwork_url');
            $table->string('track_artist');
            $table->string('post_title');
            $table->text('post_desc');
            $table->text('post_subs');
            $table->integer('register');
            $table->integer('stage')->default(1);
            
            $table->timestamps();
            
            $table->foreign('register')
              ->references('id')->on('users');
              
            $table->foreign('stage')
              ->references('id')->on('stages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
