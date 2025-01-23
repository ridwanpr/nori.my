<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Anime extends Model
{
    protected $table = 'anime';

    protected $fillable = [
        'title',
        'slug',
        'image',
        'status',
        'studio',
        'year',
        'duration',
        'synopsis',
    ];

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'anime_genres', 'anime_id', 'genre_id');
    }

    public function trending(): HasOne
    {
        return $this->hasOne(TrendingAnime::class);
    }
}
