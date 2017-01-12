<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->integer('register')->unsigned();
            $table->timestamps();
            
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('register')->references('id')->on('users');
            
            $table->unique(['post_id','register']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('clips_posts_id_foreign');
        $table->dropForeign('clips_users_id_foreign');
        Schema::drop('clips');
    }
}
