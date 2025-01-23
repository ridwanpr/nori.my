<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    protected $table = 'episodes';
    protected $fillable = [
        'anime_id',
        'ep_number',
        'ep_title',
        'ep_slug',
        'content'
    ];

    public $timestamps = false;

    public function anime(): BelongsTo
    {
        return $this->belongsTo(Anime::class);
    }
}
