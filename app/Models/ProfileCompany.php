<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileCompany extends Model
{
    protected $table = 'profile_company';
    
    protected $fillable = [
        'title',
        'description',
        'history',
        'vision',
        'mission',
        'image',
        'struktur_organisasi',
        'social_media',
        'email',
        'phone',
        'address',
        'updated_by'
    ];

    protected $casts = [
        'social_media' => 'array',
    ];

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    
    /**
     * Get the singleton instance of ProfileCompany
     * Create if doesn't exist
     */
    public static function getInstance()
    {
        $profile = static::first();
        
        if (!$profile) {
            $profile = static::create([
                'title' => 'Nama Perusahaan',
                'description' => 'Deskripsi perusahaan',
                'history' => 'Sejarah perusahaan',
                'vision' => 'Visi perusahaan',
                'mission' => 'Misi perusahaan',
                'image' => '',
                'struktur_organisasi' => '',
                'social_media' => [],
                'email' => '',
                'phone' => '',
                'address' => '',
                'updated_by' => auth()->id(),
            ]);
        }
        
        return $profile;
    }
}
