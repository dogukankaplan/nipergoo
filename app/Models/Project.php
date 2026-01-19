<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'client',
        'location',
        'description',
        'image',
        'gallery',
        'completed_at',
        'is_featured',
        'is_active',
        'order',
    ];

    protected $casts = [
        'gallery' => 'array',
        'completed_at' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderByDesc('completed_at');
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function getGalleryUrlsAttribute(): array
    {
        if (!$this->gallery)
            return [];
        return array_map(fn($img) => asset('storage/' . $img), $this->gallery);
    }
}
