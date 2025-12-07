<?php

namespace Database\Seeders;

use App\Models\SettingPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SettingPage::create([
            'title_statistic' => 'Statistik',
            'subtitle_statistic' => 'Informasi Statistik',
            'title_collection' => 'Koleksi',
            'subtitle_collection' => 'Informasi Koleksi',
            'title_gallery' => 'Galeri',
            'subtitle_gallery' => 'Informasi Galeri',
            'title_info' => 'Info',
            'subtitle_info' => 'Informasi Tambahan',
            'banner' => '',
            'updated_by' => 1, // superadmin
        ]);
    }
}
