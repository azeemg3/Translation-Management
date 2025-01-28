<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Translation>
 */
class TranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'translate_key'=>$this->faker->unique()->word(),
            'local'=>$this->faker->randomElement(['en','es','fr']),
            'content'=>$this->faker->sentence(),
            'tags'=>['web','mobile']
        ];
    }
}
