<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrendingAnime extends Model
{
    protected $table = 'trending_anime';

    protected $fillable = [
        'anime_id',
        'weekly_views',
    ];

    public function anime(): BelongsTo
    {
        return $this->belongsTo(Anime::class);
    }
}
