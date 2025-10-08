<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'     => $this->faker->sentence(6),
            'body'      => $this->faker->paragraphs(3, true),
            'published' => $this->faker->boolean(85),
        ];
    }
}
