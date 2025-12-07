<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingPage extends Model
{
    protected $table = 'setting_pages';
    
    protected $fillable = [
        'title_statistic',
        'subtitle_statistic',
        'image_statistic',
        'title_collection',
        'subtitle_collection',
        'image_collection',
        'title_gallery',
        'subtitle_gallery',
        'image_gallery',
        'title_info',
        'subtitle_info',
        'image_info',
        'banner',
        'updated_by'
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
        $setting = static::first();
        
        if (!$setting) {
            $setting = static::create([
                'title_statistic' => 'Statistik',
                'subtitle_statistic' => 'Informasi Statistik',
                'title_collection' => 'Koleksi',
                'subtitle_collection' => 'Informasi Koleksi',
                'title_gallery' => 'Galeri',
                'subtitle_gallery' => 'Informasi Galeri',
                'title_info' => 'Info',
                'subtitle_info' => 'Informasi Tambahan',
                'banner' => '',
                'updated_by' => auth()->id(),
            ]);
        }
        
        return $setting;
    }
}
