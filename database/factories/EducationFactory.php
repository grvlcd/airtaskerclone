<?php

namespace Database\Factories;

use App\Models\Education;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Education::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'school' => $this->faker->company(),
            'course' => $this->faker->jobTitle(),
            'to' => $this->faker->dateTimeBetween($startDate = '-4 year', $endDate = 'now', $timezone = null),
            'from' => $this->faker->dateTimeBetween($startDate = '-4 year', $endDate = 'now', $timezone = null),
        ];
    }
}
