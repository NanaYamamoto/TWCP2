<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->id();

            $table->string('title', 100)->comment('タイトル');
            $table->tinyInteger('publish')->default(2)->unsigned()->comment('公開フラグ');
            $table->tinyInteger('type')->default(1)->unsigned()->comment('記事タイプ');
            $table->date('publish_at')->comment('記事日');
            $table->longText('content')->comment('本文');

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
        Schema::dropIfExists('informations');
    }
}
