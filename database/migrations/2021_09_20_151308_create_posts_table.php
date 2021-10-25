<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title', 50)->comment('記事タイトル');
            $table->unsignedBigInteger('category_id')->comment('カテゴリ');
            $table->text('content')->comment('本文');
            $table->string('img')->nullable()->comment('画像');
            $table->unsignedBigInteger('user_id')->comment('登録したユーザーID');
            $table->tinyInteger('active')->unsigned()->default(1)->comment('利用可能');
            $table->tinyInteger('publish')->default(1)->unsigned()->comment('公開フラグ');
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
        Schema::dropIfExists('posts');
    }
}
