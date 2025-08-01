<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('productv2', function (Blueprint $table) {
            $table->boolean('is_new')->default(false)->after('category');
            $table->boolean('is_featured')->default(false)->after('is_new');
            $table->boolean('is_hot_sale')->default(false)->after('is_featured');
            $table->boolean('is_best_deal')->default(false)->after('is_hot_sale'); // use this for "Recommended"
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productv2', function (Blueprint $table) {
            //
        });
    }
};
