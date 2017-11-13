<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addemailinuserpartner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_partners', function (Blueprint $table) {
            // ->first() put field to the first position of table (only mysql)
            // ->after('column') put field after the column field (only mysql)
            // ->nullable() null value for this field
            // ->default($value) default value for this field
            // $table->integer('ago')->unsigned() make integer field to unsigned
            // ->renameColumn('from', 'to') rename column
            // ->index('name') add index to exist field
            // ->unique('name') set unique field
            // ->primary('name') set primary field
            $table->string('email')->nullable();
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
            $table->dropColumn('email')->nullable();
            // ->dropPrimary('user_partners_name_primary') drop Primary field
            // ->dropIndex('user_partners_name_index') drop index field
            // ->dropUnique('user_partners_name_unique') drop unique field

        });
    }
}
