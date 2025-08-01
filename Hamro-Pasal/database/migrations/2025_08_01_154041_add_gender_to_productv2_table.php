<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This 'up' method is executed when you run php artisan migrate.
     */
    public function up(): void
    {
        // We are modifying the 'productv2' table.
        Schema::table('productv2', function (Blueprint $table) {
            
            // Add a new string column called 'gender'.
            // We'll give it a default value of 'unisex' as a fallback.
            // We place it right after the 'category' column for neatness.
            $table->string('gender')->default('unisex')->after('category');

        });
    }

    /**
     * Reverse the migrations.
     * This 'down' method is used if you ever need to undo the migration.
     */
    public function down(): void
    {
        Schema::table('productv2', function (Blueprint $table) {
            
            // This defines how to undo the change: by dropping the column.
            $table->dropColumn('gender');

        });
    }
};