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
        Schema::create('loaders', function (Blueprint $table) {
            $table->id();
            $table->string('Marka', 150)->nullable();
            $table->string('RegNumber', 150)->nullable();
            $table->boolean('IsActive')->nullable();
            $table->timestamp('Updated_When')->nullable();
            $table->integer('Updated_By')->nullable();
            $table->unsignedBigInteger('UserId');
            $table->foreign('UserId')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loaders');
    }
};
