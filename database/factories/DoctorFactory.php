<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Doctor::class;
    
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'specialty' => $this->faker->word,
            'num_appointments' => $this->faker->numberBetween(1, 10),
        ];
    }
}
