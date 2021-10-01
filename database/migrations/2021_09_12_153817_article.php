<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Article extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function(Blueprint $table){
            $table->increments('id');
            $table->integer('category')->index();
            $table->string('title');
            $table->text('summary')->nullable();
            $table->mediumText('content');
            $table->tinyInteger('status')->default('0');
            $table->integer('type_id')->nullable()->index();
            $table->integer('read_cnt')->default('0');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('article_cover', function (Blueprint $table){
            $table->increments('id');
            $table->integer('article_id')->index();
            $table->string('img');
        });

        Schema::create('article_type', function (Blueprint $table){
            $table->increments('id');
            $table->integer('category')->index();
            $table->string('name');
            $table->integer('parent_id')->nullable()->index();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('article');
        Schema::drop('article_cover');
        Schema::drop('article_type');
    }
}
