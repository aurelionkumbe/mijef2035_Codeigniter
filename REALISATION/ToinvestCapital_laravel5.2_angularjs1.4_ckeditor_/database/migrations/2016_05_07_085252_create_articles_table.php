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
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->longText('content')->nullable();
            $table->string('image')->default('article.png');
            $table->boolean('published')->default(FALSE);
            $table->boolean('deleted')->default(FALSE);
            
            $table->string('country_code', 5);
            $table->string('language_code', 5);
            $table->integer('menu_id')->unsigned();
            $table->integer('account_id')->unsigned();
            
            $table->foreign('country_code')->references('code')->on('countries')->onDelete('no action');
            $table->foreign('language_code')->references('code')->on('languages')->onDelete('no action');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('no action');
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('no action');
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
        Schema::drop('articles');
    }
}
