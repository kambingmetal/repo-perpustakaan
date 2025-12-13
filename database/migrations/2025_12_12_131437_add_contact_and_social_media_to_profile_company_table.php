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
        Schema::table('profile_company', function (Blueprint $table) {
            $table->json('social_media')->nullable()->after('image');
            $table->string('email')->nullable()->after('social_media');
            $table->string('phone')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profile_company', function (Blueprint $table) {
            $table->dropColumn(['social_media', 'email', 'phone']);
        });
    }
};
