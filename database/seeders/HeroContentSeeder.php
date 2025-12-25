<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroContent;

class HeroContentSeeder extends Seeder
{
    public function run(): void
    {
        $heroContents = [
            [
                'title' => 'Selamat Datang di',
                'subtitle' => 'Perpustakaan Digital',
                'description' => 'Temukan koleksi buku dan informasi terlengkap untuk mendukung pembelajaran dan penelitian Anda.',
                'button_text' => 'Jelajahi Koleksi',
                'button_url' => '/collections',
                'image' => 'hero-contents/hero1.jpg',
                'is_active' => true,
                'sort_order' => 1,
                'created_by' => 1,
            ],
            [
                'title' => 'Akses Mudah',
                'subtitle' => 'Ribuan Koleksi Digital',
                'description' => 'Dapatkan akses ke ribuan koleksi digital berkualitas tinggi kapan saja dan dimana saja.',
                'button_text' => 'Mulai Membaca',
                'button_url' => '/galery',
                'image' => 'hero-contents/hero2.jpg',
                'is_active' => true,
                'sort_order' => 2,
                'created_by' => 1,
            ],
            [
                'title' => 'Layanan Terbaik',
                'subtitle' => 'Untuk Pendidikan',
                'description' => 'Kami menyediakan layanan perpustakaan terbaik untuk mendukung dunia pendidikan dan penelitian.',
                'button_text' => 'Pelajari Lebih Lanjut',
                'button_url' => '/about',
                'image' => 'hero-contents/hero3.jpg',
                'is_active' => true,
                'sort_order' => 3,
                'created_by' => 1,
            ],
        ];

        foreach ($heroContents as $content) {
            HeroContent::create($content);
        }
    }
}