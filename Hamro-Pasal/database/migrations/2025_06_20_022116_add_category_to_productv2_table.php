<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('productv2', function (Blueprint $table) {
            $table->string('category')->default('General')->after('image_url');
        });
    }

    public function down()
    {
        Schema::table('productv2', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }

};
