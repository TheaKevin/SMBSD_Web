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
            $table->string('nickname')->nullable();
            $table->string('gender')->default('male');
            $table->date('dob');
            $table->integer('age')->nullable();
            $table->string('address')->nullable();
            $table->string('classSMBSD')->nullable();
            $table->string('classSchool')->nullable();
            $table->string('schoolName')->nullable();
            $table->string('hobby')->nullable();
            $table->string('hope')->nullable();
            $table->string('ekskul')->nullable();
            $table->integer('point')->default(0);
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
