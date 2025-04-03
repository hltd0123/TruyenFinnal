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
        Schema::create('stories', function (Blueprint $table) {
            $table->id('id');
            $table->string('title');
            $table->text('description');
            $table->string('coverImage');
            $table->boolean('status');
            $table->bigInteger('authorId')->unsigned();
            $table->bigInteger('categoryId')->unsigned();
            $table->timestamps();
            $table->foreign('authorId')->references('id')->on('authors');
            $table->foreign('categoryId')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stories');
    }
};
