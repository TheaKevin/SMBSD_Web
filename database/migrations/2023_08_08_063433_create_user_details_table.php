<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nickname');
            $table->string('gender');
            $table->date('dob');
            $table->integer('age');
            $table->string('address');
            $table->string('classSMBSD');
            $table->string('classSchool');
            $table->string('schoolName');
            $table->string('hobby');
            $table->string('hope');
            $table->string('ekskul');
            $table->string('point');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
