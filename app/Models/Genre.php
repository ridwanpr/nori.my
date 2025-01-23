<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    protected $table = 'genres';

    protected $fillable = [
        'name', 'slug'
    ];

    public function anime(): BelongsToMany
    {
        return $this->belongsToMany(
            Anime::class,
            'anime_genres',
            'genre_id',
            'anime_id'
        );
    }
}
