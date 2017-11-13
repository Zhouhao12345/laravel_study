<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftdeleteInUserPartner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_partners', function (Blueprint $table) {
            // Soft Delete, delete record not actually delete, it would
            // be marked with 'deleted_at' fields with delete date
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
        Schema::table('user_partners', function (Blueprint $table) {
            //
        });
    }
}
