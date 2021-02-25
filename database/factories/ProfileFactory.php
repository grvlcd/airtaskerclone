<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'age' => $this->faker->numberBetween(18, 25),
            'birthday' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'path' => 'https://gravatar.com/avatar/404?d=mp',
        ];
    }
}
