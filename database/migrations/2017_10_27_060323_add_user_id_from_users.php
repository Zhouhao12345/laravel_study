<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdFromUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_partners', function (Blueprint $table) {

            $table->integer('user_id')
                ->nullable()
                ->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_partners', function (Blueprint $table) {

            $table->dropForeign('user_partners_user_id_foreign');
            // another solution $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
