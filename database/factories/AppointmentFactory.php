<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Appointment::class;
    public function definition()
    {
        return [
            'doctor_id' => function () {
                return Doctor::factory()->create()->id;
            },
            'appointment_time' => $this->faker->dateTimeBetween('now', '+1 week'),
            'patient_name' => $this->faker->name,
        ];
    }
}
