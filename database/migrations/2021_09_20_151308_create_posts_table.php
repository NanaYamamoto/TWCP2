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
            $table->bigIncrements('id');
            $table->string('category')->comment('カテゴリ');
            $table->text('content')->comment('本文');
            $table->string('img')->nullable()->comment('画像');
            $table->foreignId('user_id')->constrained()->comment('登録したユーザーID');
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
