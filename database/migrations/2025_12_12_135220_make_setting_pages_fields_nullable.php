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
            $table->string('title_statistic')->nullable()->change();
            $table->string('subtitle_statistic')->nullable()->change();
            $table->string('title_collection')->nullable()->change();
            $table->string('subtitle_collection')->nullable()->change();
            $table->string('title_gallery')->nullable()->change();
            $table->string('subtitle_gallery')->nullable()->change();
            $table->string('title_info')->nullable()->change();
            $table->string('subtitle_info')->nullable()->change();
            $table->string('banner')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('setting_pages', function (Blueprint $table) {
            $table->string('title_statistic')->nullable(false)->change();
            $table->string('subtitle_statistic')->nullable(false)->change();
            $table->string('title_collection')->nullable(false)->change();
            $table->string('subtitle_collection')->nullable(false)->change();
            $table->string('title_gallery')->nullable(false)->change();
            $table->string('subtitle_gallery')->nullable(false)->change();
            $table->string('title_info')->nullable(false)->change();
            $table->string('subtitle_info')->nullable(false)->change();
            $table->string('banner')->nullable(false)->change();
        });
    }
};
