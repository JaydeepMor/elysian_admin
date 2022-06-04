<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropVoicesTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('voices', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropForeign(['accent_id']);
            $table->dropForeign(['delivery_style_id']);
            $table->dropForeign(['character_id']);
            $table->dropForeign(['impersonation_id']);
            $table->dropColumn(['language_id', 'accent_id', 'delivery_style_id', 'character_id', 'impersonation_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
