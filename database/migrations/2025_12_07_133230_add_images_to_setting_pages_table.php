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
        Schema::table('setting_pages', function (Blueprint $table) {
            $table->string('image_statistic')->nullable()->after('subtitle_statistic');
            $table->string('image_collection')->nullable()->after('subtitle_collection');
            $table->string('image_gallery')->nullable()->after('subtitle_gallery');
            $table->string('image_info')->nullable()->after('subtitle_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('setting_pages', function (Blueprint $table) {
            $table->dropColumn(['image_statistic', 'image_collection', 'image_gallery', 'image_info']);
        });
    }
};
