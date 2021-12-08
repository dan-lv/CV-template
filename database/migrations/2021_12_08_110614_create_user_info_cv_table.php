<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfoCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info_cv', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('name')->nullable();
            $table->text('avatar_url')->nullable();
            $table->text('job')->nullable();
            $table->text('gender')->nullable();
            $table->text('birthday')->nullable();
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('website')->nullable();
            $table->text('career_goals')->nullable();
            $table->text('education')->nullable();
            $table->text('work_experience')->nullable();
            $table->text('activities')->nullable();
            $table->text('certifications')->nullable();
            $table->text('skill')->nullable();
            $table->text('hobit')->nullable();
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
        Schema::dropIfExists('user_info_cv');
    }
}
