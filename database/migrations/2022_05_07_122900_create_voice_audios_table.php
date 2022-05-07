<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoiceAudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voice_audios', function (Blueprint $table) {
            $table->id();
            $table->string('mp3_title')->nullable();
            $table->string('mp3')->nullable();
            $table->bigInteger('voice_id')->unsigned()->nullable();
            $table->foreign('voice_id')->references('id')->on('voices')->onDelete('cascade');
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
        Schema::dropIfExists('voice_audios');
    }
}
