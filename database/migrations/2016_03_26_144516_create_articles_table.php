<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_records', function (Blueprint $table) {
		$table->increments('id');
		$table->timestamp('published_at');
		$table->timestamp('created_at');
		$table->timestamp('updated_at');
		$table->boolean('online');
		$table->integer('plate_id');
	});
	Schema::create('article_translations', function (Blueprint $table) {
		$table->increments('id');
		$table->integer('article_id')->unsigned();
		$table->string('locale')->index();
		$table->string('title');
		$table->text('abstract');
		$table->text('content');
		$table->integer('n_read')->unsigned();
		$table->unique(['article_id','locale']);
		$table->integer('language');
		$table->foreign('article_id')->references('id')->on('article_records')->onDelete('cascade');
	});
	Schema::create('article_plates', function(Blueprint $table) {
		$table->increments('id');
		$table->text('name');
		$table->text('translate_name');
		$table->boolean('is_leaf');
		$table->integer('parent_id');
		$table->integer('level');
		$table->timestamp('updated_at');
		$table->timestamp('create_at');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::drop('article_records');
	    Schema::drop('article_translations');
	    Schema::drop('articles_plates');
    }
}
