<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Information extends Model
{
    protected $table = 'informations';

    protected $fillable = [
        'title',
        'category_id',
        'overview',
        'content',
        'view_on_front',
        'is_video',
        'image',
        'youtube_link',
        'created_by',
    ];

    protected $casts = [
        'view_on_front' => 'boolean',
        'is_video' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
