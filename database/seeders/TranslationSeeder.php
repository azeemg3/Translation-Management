<?php

namespace Database\Seeders;

use App\Jobs\InsertTranslationBatchJobData;
use App\Models\Translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Validation\Rules\Unique;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Log;

use function Illuminate\Log\log;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $batchSize = 1000;
        $total_records = 100000;
        $iterations = $total_records / $batchSize;
        $data = [];
        for ($i = 1; $i <= $total_records; $i++) {
            $data[] = [
                'translate_key' => $faker->unique()->sentence,
                'content'       => $faker->text,
                'local'         => $faker->randomElement(['en', 'fr', 'es']),
               'tags' => json_encode(['web', 'mobile']),
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
            if ($i % $batchSize === 0) {
                InsertTranslationBatchJobData::dispatch($data);
                $data = [];
            }
        }
        if (!empty($data)) {
            // DB::table('translations')->insert($data);
            InsertTranslationBatchJobData::dispatch($data);
        }
    }
}
