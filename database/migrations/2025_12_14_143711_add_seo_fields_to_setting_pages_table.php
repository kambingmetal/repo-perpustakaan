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
            $table->text('site_description')->nullable()->after('for_route');
            $table->text('meta_keyword')->nullable()->after('site_description');
            $table->text('meta_description')->nullable()->after('meta_keyword');
            $table->string('favicon')->nullable()->after('meta_description');
            $table->string('og_image')->nullable()->after('favicon');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('setting_pages', function (Blueprint $table) {
            $table->dropColumn([
                'site_description',
                'meta_keyword', 
                'meta_description',
                'favicon',
                'og_image'
            ]);
        });
    }
};
