<?php

namespace Database\Factories;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empleado::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'paterno' => $this->faker->lastName,
            'materno' => $this->faker->lastName,
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'edad' => $this->faker->numberBetween(18, 65),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
