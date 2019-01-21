<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	Schema::create('achievements_journalpapers', function (Blueprint $table) {
	  $table->increments('id');
	  $table->timestamp('published_at');
	  $table->timestamps();
	  $table->text('author');
	  $table->string('journal');
	  $table->text('abstract');
	  $table->string('volumn');
	  $table->string('issue');
	  $table->integer('page_begin');
	  $table->integer('page_end');
	  $table->string('doi');
	  $table->string('issn');
	  $table->string('publisher');
	});
	Schema::create('achievements_conferencepapers', function (Blueprint $table) {
	  $table->increments('id');
	  $table->timestamp('published_at');
	  $table->timestamps();
	  $table->text('author');
	  $table->string('conference');
	  $table->text('abstract');
  	  $table->integer('page_begin');
	  $table->integer('page_end');
	  $table->string('doi');
	  $table->string('publisher');
	});
	Schema::create('achievements_books', function (Blueprint $table) {
	  $table->increments('id');
	  $table->timestamp('published_at');
	  $table->timestamps();
	  $table->text('author');
	  $table->string('book');
	  $table->string('isbn');
	  $table->string('press'); 
	  $table->string('edition');
	});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('journalpapers');
      Schema::drop('conferencepapers');
      Schema::drop('books');
    }
}
