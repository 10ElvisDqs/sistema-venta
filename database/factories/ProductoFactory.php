<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'abreviatura' => $this->faker->lexify('???'),
            'descripcion' => $this->faker->text(50),  // Limita a 50 caracteres
            'precio' => $this->faker->randomFloat(2, 1, 1000),
            'stock' => $this->faker->numberBetween(0, 100),
            'marca' => $this->faker->company,
            'Pais_Origen' => substr($this->faker->country, 0, 35),  // Limita a 35 caracteres
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
