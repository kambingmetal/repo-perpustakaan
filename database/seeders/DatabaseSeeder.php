<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Super Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@admin.com',
            'password' => bcrypt('password'),
            'role' => 'superadmin',
        ]);

        // Create Regular Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
        
        // Create Profile Company
        $this->call(ProfileCompanySeeder::class);
        
        // Create Hero Content
        $this->call(HeroContentSeeder::class);
    }
}
