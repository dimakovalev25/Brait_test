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
        Schema::create('loaders_breaking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('LoaderId')->nullable();
            $table->timestamp('DateBegin')->nullable();
            $table->timestamp('DateEnd')->nullable();
            $table->text('Note')->nullable();
            $table->timestamp('Updated_When')->nullable();
            $table->integer('Updated_By')->nullable();
            $table->foreign('LoaderId')->references('id')->on('loaders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loaders_breaking');
    }
};
