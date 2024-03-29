<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->comment('名前');
            $table->string('email', 100)->unique();
            $table->datetime('email_verified_at')->nullable()->comment('メールアドレス確認日時');
            $table->string('password', 100);
            $table->tinyInteger('type')->default(1)->comment('メンバータイプ');
            $table->tinyInteger('active')->comment('利用可能フラグ');
            $table->string('icon_url')->nullable()->comment('アイコン');
            $table->rememberToken()->comment('パスワード再発行トークン');
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
        Schema::dropIfExists('members');
    }
}
