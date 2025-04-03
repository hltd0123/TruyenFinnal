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
        Schema::create('views', function (Blueprint $table) {
            $table->id('id');
            $table->timestamp('viewed_at');
            $table->integer('status');
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('storyId')->unsigned();
            $table->bigInteger('chapterId')->unsigned();
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
        Schema::drop('views');
    }
};
