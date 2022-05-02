<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voices', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('user_name')->nullable();
            $table->bigInteger('gender_id')->unsigned()->nullable();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->bigInteger('age_group_id')->unsigned()->nullable();
            $table->foreign('age_group_id')->references('id')->on('age_groups')->onDelete('cascade');
            $table->bigInteger('race_id')->unsigned()->nullable();
            $table->foreign('race_id')->references('id')->on('races')->onDelete('cascade');
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
            $table->bigInteger('home_studio_id')->unsigned()->nullable();
            $table->foreign('home_studio_id')->references('id')->on('home_studios')->onDelete('cascade');
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
        Schema::dropIfExists('voices');
    }
}
