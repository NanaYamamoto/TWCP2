<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //ユーザータイプ、利用可能フラグ、アイコン
            $table->tinyInteger('type')->unsigned()->default(1)->after('email_verified_at');
            $table->tinyInteger('active')->unsigned()->default(1)->after('type');
            $table->string('icon_url')->nullable()->after('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('active');
            $table->dropColumn('icon_url');
        });
    }
}
