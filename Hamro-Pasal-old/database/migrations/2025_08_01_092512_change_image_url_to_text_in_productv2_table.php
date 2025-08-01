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
        Schema::table('productv2', function (Blueprint $table) {
            // This is the important line: It changes the column to TEXT
            $table->text('image_url')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productv2', function (Blueprint $table) {
            // This allows you to reverse the change if you ever need to
            $table->string('image_url', 255)->nullable()->change();
        });
    }
};