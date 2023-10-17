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
        Schema::create('clicks', function (Blueprint $table) {
            $table->id();
            //if the user is not signed in 
            $table->unsignedBigInteger('category_id');
            // if the user signed in 
            $table->foreign('category_id')->references('id')->on('news_categories');

            // Add a created_at column
            $table->timestamp('created_at');

            // Add a user_id column
            //if user is not signed in
            $table->unsignedBigInteger('user_id')->nullable();
            // if the user signed in 
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clicks');
    }
};
