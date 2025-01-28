<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class InsertTranslationBatchJobData implements ShouldQueue
{
    use Queueable,Dispatchable,SerializesModels;
    public $translations;
    /**
     * Create a new job instance.
     */
    public function __construct($translations)
    {
        $this->translations = $translations;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->translations as $translation) {
            DB::table('translations')->insert($translation);
        }
    }
}
