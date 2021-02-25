<?php

namespace Database\Factories;

use App\Models\Certificate;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Certificate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'to' => $this->faker->dateTimeBetween($startDate = '-4 year', $endDate = 'now', $timezone = null),
            'from' => $this->faker->dateTimeBetween($startDate = '-4 year', $endDate = 'now', $timezone = null),
        ];
    }
}
