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
        Schema::create('anniversary_dealers', function (Blueprint $table) {
            $table->id();
            $table->date('eventDate');
            $table->text('name');
            $table->unsignedBigInteger('IDDealer');
            $table->foreign('IDDealer')->references('id')->on('dealers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anniversary_dealers');
    }
};
