<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'telefono' => $this->faker->optional()->phoneNumber,
            'fecha_nacimiento' => $this->faker->optional()->date,
            'direccion' => $this->faker->optional()->address,
            'ciudad' => $this->faker->optional()->city,
            'pais' => $this->faker->optional()->country,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
