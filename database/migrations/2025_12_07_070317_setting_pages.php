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
        Schema::create('setting_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title_statistic');
            $table->string('subtitle_statistic');
            $table->string('title_collection');
            $table->string('subtitle_collection');
            $table->string('title_gallery');
            $table->string('subtitle_gallery');
            $table->string('title_info');
            $table->string('subtitle_info');
            $table->text('banner');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
