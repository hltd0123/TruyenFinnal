<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id('id');
            $table->text('content');
            $table->integer('status');
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('storyId')->unsigned();
            $table->bigInteger('chapterId')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('storyId')->references('id')->on('stories');
            $table->foreign('chapterId')->references('id')->on('chapters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
};
