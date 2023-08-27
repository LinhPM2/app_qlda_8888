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
        Schema::create('group_detail_dealers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IDDealer');
            $table->unsignedBigInteger('IDGroup');
            $table->foreign('IDDealer')->references('id')->on('dealers');
            $table->foreign('IDGroup')->references('id')->on('group_dealers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_detail_dealers');
    }
};
