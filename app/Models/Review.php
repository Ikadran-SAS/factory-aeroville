<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'google_review_id',
        'author_name', 'author_initial', 'avatar_color',
        'rating', 'content', 'source', 'date_label',
        'is_featured', 'is_visible', 'sort_order',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_featured' => 'boolean',
        'is_visible' => 'boolean',
    ];

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true)->where('is_visible', true);
    }

    public function getStarsHtmlAttribute(): string
    {
        $html = '';
        for ($i = 1; $i <= 5; $i++) {
            $class = $i <= $this->rating ? 'star' : 'star empty';
            $html .= "<span class=\"{$class}\">★</span>";
        }

        return $html;
    }
}
