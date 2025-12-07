<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statistics = [
            [
                'name' => 'Total Buku',
                'value' => 5000,
                'icon' => 'heroicon-o-book-open',
            ],
            [
                'name' => 'Anggota Aktif',
                'value' => 1250,
                'icon' => 'heroicon-o-users',
            ],
            [
                'name' => 'Buku Dipinjam',
                'value' => 750,
                'icon' => 'heroicon-o-arrow-right-circle',
            ],
            [
                'name' => 'Pengunjung Hari Ini',
                'value' => 120,
                'icon' => 'heroicon-o-user-group',
            ],
        ];

        foreach ($statistics as $statistic) {
            Statistic::create($statistic);
        }
    }
}

