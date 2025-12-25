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
        Schema::table('hero_contents', function (Blueprint $table) {
            // Hapus field yang tidak diperlukan
            $table->dropColumn(['subtitle', 'description', 'button_text', 'button_url', 'sort_order']);
            
            // Tambah field seperti galery
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete()->after('title');
            $table->boolean('is_video')->default(false)->after('category_id');
            $table->text('youtube_link')->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hero_contents', function (Blueprint $table) {
            // Kembalikan field yang dihapus
            $table->string('subtitle')->after('title');
            $table->text('description')->after('subtitle');
            $table->string('button_text')->nullable()->after('description');
            $table->string('button_url')->nullable()->after('button_text');
            $table->integer('sort_order')->default(0)->after('button_url');
            
            // Hapus field galery
            $table->dropForeign(['category_id']);
            $table->dropColumn(['category_id', 'is_video', 'youtube_link']);
        });
    }
};
