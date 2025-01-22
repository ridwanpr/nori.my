<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnimeGenre extends Model
{
    protected $table = 'anime_genres';

    public $timestamps = false;

    protected $fillable = [
        'anime_id',
        'genre_id',
    ];

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function anime(): BelongsTo
    {
        return $this->belongsTo(Anime::class);
    }
}
