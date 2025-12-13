<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceType extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'icon',
    ];
    
    public function getIconClassAttribute()
    {
        // If icon is provided, use it, otherwise use default icon
        return $this->icon ?: 'icon-12';
    }
}
