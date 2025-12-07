# Sistem Informasi Perpustakaan

Sistem Informasi Perpustakaan berbasis web menggunakan Laravel 11 dan Filament 3. Aplikasi ini menyediakan fitur untuk manajemen konten website perpustakaan dengan panel admin yang lengkap.

## Tech Stack

- **Framework**: Laravel 11
- **Admin Panel**: Filament 3
- **Database**: MySQL
- **Frontend**: Blade Template + Vite
- **PHP**: ^8.2

## Fitur Utama

### Panel Admin (Filament)
- **Dashboard** - Overview statistik perpustakaan
- **Manajemen Pengguna** - CRUD users dengan role-based access
- **Konten Website**:
  - Sliders - Banner slider homepage
  - Partner - Logo dan link partner/mitra
  - Galeri - Foto kegiatan dengan kategori
  - Informasi - Berita dan pengumuman dengan kategori
  - Kategori - Kategori untuk galeri dan informasi
  - Jenis Layanan - Layanan yang tersedia
  - Fasilitas - Fasilitas perpustakaan
- **Pengaturan**:
  - Profile Perusahaan - Info organisasi
  - Pengaturan Halaman - Title, subtitle, dan gambar setiap section
  - Statistik - Data statistik perpustakaan
  - Jam Layanan - Jadwal operasional dengan rentang hari

### Website Publik
- Homepage dengan slider dinamis
- Info statistik perpustakaan
- Galeri foto dan informasi
- Daftar partner/mitra
- Informasi layanan dan fasilitas

## Instalasi

### Requirements
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL

### Langkah Instalasi

1. Clone repository
```bash
git clone <repository-url>
cd repo-perpustakaan
```

2. Install dependencies
```bash
composer install
npm install
```

3. Setup environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Konfigurasi database di file `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=perpustakaan
DB_USERNAME=root
DB_PASSWORD=
```

5. Jalankan migration dan seeder
```bash
php artisan migrate
php artisan db:seed
```

6. Setup storage symlink
```bash
php artisan storage:link
```

7. Build assets
```bash
npm run build
```

8. Jalankan aplikasi
```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## Akses Admin

Setelah menjalankan seeder, akses panel admin di:
- URL: `http://localhost:8000/admin`
- Email: (sesuai seeder)
- Password: (sesuai seeder)

## Database Structure

### Main Tables
- `users` - Data pengguna dengan role
- `sliders` - Banner homepage
- `partners` - Partner/mitra dengan logo dan link
- `categories` - Kategori untuk galeri dan informasi
- `galeries` - Galeri foto
- `informations` - Berita dan pengumuman
- `statistics` - Data statistik
- `service_hours` - Jam operasional
- `service_types` - Jenis layanan
- `facilities` - Fasilitas
- `profile_companies` - Info organisasi (singleton)
- `setting_pages` - Pengaturan halaman (singleton)

## Development

### Compile assets untuk development
```bash
npm run dev
```

### Build untuk production
```bash
npm run build
```
