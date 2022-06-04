<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoiceIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voice_ids', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('voice_id')->unsigned()->nullable();
            $table->foreign('voice_id')->references('id')->on('voices')->onDelete('cascade');
            $table->bigInteger('language_id')->unsigned()->nullable();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->bigInteger('accent_id')->unsigned()->nullable();
            $table->foreign('accent_id')->references('id')->on('accents')->onDelete('cascade');
            $table->bigInteger('delivery_style_id')->unsigned()->nullable();
            $table->foreign('delivery_style_id')->references('id')->on('delivery_styles')->onDelete('cascade');
            $table->bigInteger('character_id')->unsigned()->nullable();
            $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
            $table->bigInteger('impersonation_id')->unsigned()->nullable();
            $table->foreign('impersonation_id')->references('id')->on('impersonations')->onDelete('cascade');
            $table->timestamps();
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
        Schema::dropIfExists('voice_ids');
    }
}
