# Setup Admin Panel - Laravel Filament

## Informasi Setup

Panel admin telah berhasil disetup dengan menggunakan Laravel Filament 3 dengan konfigurasi berikut:

### URL Panel Admin
```
http://localhost:8000/admin-page
```

### Kredensial Login Default

**Super Admin:**
- Email: `superadmin@admin.com`
- Password: `password`
- Role: Super Admin (akses penuh)

**Admin:**
- Email: `admin@admin.com`
- Password: `password`
- Role: Admin (akses terbatas sesuai permissions)

## Fitur Yang Tersedia

### 1. Dashboard
- Menampilkan statistik admin
- Total admin dan super admin
- Total pengaturan hak akses

### 2. Kelola Admin
**Lokasi Menu:** Manajemen Admin > Kelola Admin

**Fitur:**
- Lihat daftar semua admin dan super admin
- Tambah admin baru
- Edit informasi admin
- Hapus admin (hanya super admin)
- Set role admin atau superadmin

**Field yang tersedia:**
- Nama
- Email
- Password
- Role (admin/superadmin)

**Permission:**
- Semua admin dapat melihat daftar admin
- Hanya super admin yang dapat mengubah role
- Admin tidak bisa menghapus dirinya sendiri

### 3. Hak Akses Admin
**Lokasi Menu:** Manajemen Admin > Hak Akses Admin

**Fitur:**
- Atur hak akses CRUD untuk setiap admin
- Tambah permission baru untuk resource tertentu
- Edit permission yang sudah ada
- Hapus permission (hanya super admin)

**Permission yang dapat diatur:**
- **can_view**: Izin untuk melihat data
- **can_create**: Izin untuk membuat data baru
- **can_edit**: Izin untuk mengedit data
- **can_delete**: Izin untuk menghapus data

**Catatan:**
- Hanya super admin yang dapat mengakses menu ini
- Super admin otomatis memiliki semua akses
- Permission diatur per resource/module

## Struktur Database

### Table: users
```
- id
- name
- email
- password
- role (admin/superadmin)
- email_verified_at
- remember_token
- created_at
- updated_at
```

### Table: permissions
```
- id
- user_id (foreign key ke users)
- resource (nama module/resource)
- can_view (boolean)
- can_create (boolean)
- can_edit (boolean)
- can_delete (boolean)
- created_at
- updated_at
- unique constraint: (user_id, resource)
```

## Helper Methods di User Model

### Checking Role
```php
// Check apakah user adalah superadmin
$user->isSuperAdmin(); // returns boolean

// Check apakah user adalah admin (admin atau superadmin)
$user->isAdmin(); // returns boolean
```

### Checking Permission
```php
// Check permission untuk action tertentu pada resource
$user->hasPermission('view', 'books'); // returns boolean
$user->hasPermission('create', 'books');
$user->hasPermission('edit', 'books');
$user->hasPermission('delete', 'books');

// Super admin akan selalu return true untuk semua permission
```

### Relationship
```php
// Get semua permissions dari user
$user->permissions; // returns collection
```

## Cara Menggunakan Permission di Resource Lain

Ketika membuat resource baru di Filament, Anda dapat menggunakan permission system:

```php
use Filament\Resources\Resource;

class BookResource extends Resource
{
    // ... konfigurasi lainnya
    
    public static function canViewAny(): bool
    {
        return auth()->user()->hasPermission('view', 'books');
    }
    
    public static function canCreate(): bool
    {
        return auth()->user()->hasPermission('create', 'books');
    }
    
    public static function canEdit($record): bool
    {
        return auth()->user()->hasPermission('edit', 'books');
    }
    
    public static function canDelete($record): bool
    {
        return auth()->user()->hasPermission('delete', 'books');
    }
}
```

## Migration yang Dibuat

1. `2025_12_07_045452_add_role_to_users_table.php` - Menambah kolom role ke users
2. `2025_12_07_045501_create_permissions_table.php` - Membuat table permissions

## Cara Menjalankan

1. Pastikan database sudah dikonfigurasi di `.env`
2. Jalankan migration (sudah dijalankan):
   ```bash
   php artisan migrate
   ```
3. Jalankan seeder untuk membuat admin default (sudah dijalankan):
   ```bash
   php artisan db:seed
   ```
4. Akses panel admin:
   ```
   http://localhost:8000/admin-page
   ```

## Security Notes

⚠️ **PENTING untuk Production:**

1. **Ubah Password Default**
   - Segera ubah password untuk superadmin@admin.com dan admin@admin.com
   - Gunakan password yang kuat

2. **Environment**
   - Pastikan `APP_ENV=production` di production
   - Set `APP_DEBUG=false` di production

3. **Database**
   - Backup database secara berkala
   - Lindungi akses ke database

4. **Email**
   - Ubah email default dengan email yang valid
   - Setup email verification jika diperlukan

## Troubleshooting

### Error "Unable to locate class"
Jalankan:
```bash
composer dump-autoload
php artisan config:clear
php artisan cache:clear
```

### Tidak bisa login
1. Pastikan user sudah dibuat dengan seeder
2. Check apakah role sudah diset dengan benar
3. Verifikasi di database:
   ```sql
   SELECT * FROM users;
   ```

### Permission tidak bekerja
1. Pastikan relationship permissions sudah benar di User model
2. Check apakah permission record sudah ada di database
3. Verifikasi super admin selalu mendapat akses penuh

## Customisasi Lebih Lanjut

### Menambah Role Baru
Edit file `app/Models/User.php` dan update method `isAdmin()` jika ingin menambah role baru.

### Menambah Permission Baru
Cukup buat record baru di table permissions dengan resource yang berbeda.

### Mengubah Warna Theme
Edit `app/Providers/Filament/AdminPagePanelProvider.php` pada bagian `colors()`.

### Menambah Widget di Dashboard
1. Buat widget baru: `php artisan make:filament-widget NamaWidget`
2. Daftarkan di `AdminPagePanelProvider.php`
