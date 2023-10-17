<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('clicks', function (Blueprint $table) {
            // Remove the foreign key constraint first
            $table->dropForeign(['user_id']);
            
            // Remove the user_id column
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('clicks', function (Blueprint $table) {
            // You can re-add the user_id column and its foreign key constraint if needed.
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
};
