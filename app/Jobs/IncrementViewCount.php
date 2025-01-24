<?php

namespace App\Jobs;

use App\Models\TrendingAnime;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncrementViewCount implements ShouldQueue
{
    use Queueable;

    protected $animeId;

    /**
     * Create a new job instance.
     */
    public function __construct($animeId)
    {
        $this->animeId = $animeId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $trendingAnime = TrendingAnime::where('anime_id', $this->animeId)->firstOrCreate(
            ['anime_id' => $this->animeId],
            ['weekly_views' => 0]
        );

        $trendingAnime->increment('weekly_views');
    }
}
