<?php

namespace Database\Seeders;

use App\Models\ProfileCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfileCompany::create([
            'title' => 'Perpustakaan Digital',
            'description' => 'Perpustakaan Digital adalah platform modern yang menyediakan akses mudah ke berbagai koleksi buku dan sumber daya pendidikan.',
            'history' => 'Didirikan pada tahun 2025, Perpustakaan Digital hadir untuk memenuhi kebutuhan literasi di era digital.',
            'vision' => 'Menjadi perpustakaan digital terdepan yang memberikan akses mudah dan merata kepada seluruh masyarakat.',
            'mission' => 'Menyediakan koleksi lengkap, mengembangkan teknologi, dan meningkatkan minat baca masyarakat.',
            'image' => '',
            'updated_by' => 1, // ID superadmin
        ]);
    }
}

