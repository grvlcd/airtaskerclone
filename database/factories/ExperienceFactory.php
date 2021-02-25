<?php

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Experience::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company' => $this->faker->company(),
            'position' => $this->faker->jobTitle(),
            'to' => $this->faker->dateTimeBetween($startDate = '-4 year', $endDate = 'now', $timezone = null),
            'from' => $this->faker->dateTimeBetween($startDate = '-4 year', $endDate = 'now', $timezone = null),
        ];
    }
}
