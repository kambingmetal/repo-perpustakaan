<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactMessage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'is_read',
        'ip_address',
        'user_agent'
    ];
    
    protected $casts = [
        'is_read' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    
    public function markAsRead()
    {
        $this->update(['is_read' => true]);
    }
    
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }
    
    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }
}
