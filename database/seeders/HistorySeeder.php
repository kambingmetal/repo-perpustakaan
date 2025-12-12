<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\History;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $histories = [
            [
                'year' => '1997',
                'title' => 'Pendirian Perpustakaan',
                'description' => 'Perpustakaan didirikan dengan tujuan menyediakan sumber informasi dan pengetahuan bagi masyarakat. Dimulai dengan koleksi buku yang sederhana namun berkualitas.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'year' => '2003',
                'title' => 'Digitalisasi Pertama',
                'description' => 'Memulai era digital dengan mengembangkan sistem katalog online dan digitalisasi koleksi buku-buku langka dan bersejarah.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'year' => '2008',
                'title' => 'Perluasan Gedung Baru',
                'description' => 'Membuka gedung baru dengan fasilitas yang lebih lengkap termasuk ruang baca yang nyaman, area diskusi, dan teknologi modern untuk mendukung pembelajaran.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'year' => '2016',
                'title' => 'Modernisasi Sistem',
                'description' => 'Mengupdate seluruh sistem perpustakaan dengan teknologi terkini, termasuk sistem manajemen perpustakaan digital dan layanan online untuk anggota.',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($histories as $history) {
            History::create($history);
        }
    }
}