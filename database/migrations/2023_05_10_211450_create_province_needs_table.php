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
        Schema::create('province_needs', function (Blueprint $table) {
            $table->id();
            $table->string('provinceName');
            $table->string('donationType');
            $table->integer('amount');
            $table->string('state');
            $table->timestamps();
            $table->foreign('provinceName')->references('provinceName')->on('provinces')->onDelete('cascade');
            $table->foreign('donationType')->references('donationType')->on('donations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('province_needs');
    }
};
