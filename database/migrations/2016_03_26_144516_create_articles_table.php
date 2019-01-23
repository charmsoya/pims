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
		$table->timestamp('published_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		$table->boolean('online');
		$table->integer('plate_id');
	});
	Schema::create('article_locales', function(Blueprint $table) {
		$table->increments('id');
		$table->text('name');
		$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));	
	});
	Schema::create('article_translations', function (Blueprint $table) {
		$table->increments('id');
		$table->integer('article_id')->unsigned();
		$table->integer('locale_id')->unsigned();	
		$table->string('title');
		$table->text('abstract');
		$table->text('content');
		$table->integer('n_read')->unsigned();
		$table->foreign('article_id')->references('id')->on('article_records')->onDelete('cascade');
		$table->foreign('locale_id')->references('id')->on('article_locales')->onDelete('cascade');
	});
	Schema::create('article_plates', function(Blueprint $table) {
		$table->increments('id');
		$table->text('name');
		$table->text('translate_name');
		$table->boolean('is_leaf');
		$table->integer('parent_id');
		$table->integer('level');
		$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
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
