<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Empleado; // Asegúrate de ajustar el namespace según tu aplicación
use App\Models\User;
class EmpleadoTest extends TestCase
{
    /**
     * Test para validar la creación de un empleado válido.
     */
    public function testCrearEmpleadoValido()
    {
    $empleado = new Empleado([
        'nombre' => 'Juan',
        'paterno' => 'Pérez',
        'materno' => 'Gómez',
        'telefono' => '1234567890',
        'direccion' => 'Calle Principal 123',
        'edad' => 30,
        'sexo' => 'M',
    ]);

    $this->assertTrue($empleado->save());
    }

    /**
     * Test para validar la validación de campos obligatorios.
     */
    public function testValidacionCamposObligatorios()
    {
        $user = User::factory()->create(); // Crear un usuario para autenticar

        $this->actingAs($user); // Autenticar al usuario

        $response = $this->postJson(route('empleado.store'), []); // Realizar la solicitud POST

        $response->assertStatus(422); // Verificar el código de estado 422 para errores de validación
        $response->assertJsonValidationErrors([
            'nombre', 'paterno', 'materno', 'telefono', 'direccion', 'edad', 'sexo'
        ]); // Verificar los campos obligatorios
    }

    public function testValidacionDatosEntrada()
    {
        // Autenticar un usuario (por ejemplo, utilizando un factory de usuario)
        $user = User::factory()->create(); // Crear un usuario para autenticar

        $this->actingAs($user); // Autenticar al usuario
        // Intenta crear un empleado con datos inválidos
        $response = $this->postJson(route('empleado.store'), [
            'nombre' => '', // Nombre vacío (debería fallar la validación)
            'paterno' => 'Gómez',
            'materno' => 'López',
            'telefono' => '1234567890',
            'direccion' => 'Calle Principal 123',
            'edad' => 25,
            'sexo' => 'M',
        ]);

        // Verifica que se reciba un error de validación
        $response->assertStatus(422);

        // Verifica que se reciban errores específicos de validación
        $response->assertJsonValidationErrors(['nombre']);
    }

    public function testValidacionFormatoDatos()
    {
        $user = User::factory()->create();
        $this->actingAs($user);


        // Datos inválidos
        $response = $this->postJson(route('empleado.store'), [
            'nombre' => 'John',
            'paterno' => 'Doe',
            'materno' => 'Smith',
            'telefono' => 'invalid_phone', // Formato de teléfono inválido
            'direccion' => 'Calle Principal 123',
            'edad' => 'invalid_age', // Edad inválida
            'sexo' => 'X', // Sexo inválido
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['telefono', 'edad', 'sexo']);
    }

    public function testActualizacionEmpleado()
    {
        // Crear un usuario y autenticarlo
        $user = User::factory()->create();
        $this->actingAs($user);

        // Crear un empleado de ejemplo
        $empleado = Empleado::factory()->create([
            'nombre' => 'John',
            'paterno' => 'Doe',
            'materno' => 'Smith',
            'telefono' => '12345678',
            'direccion' => 'Calle Principal 123',
            'edad' => 30,
            'sexo' => 'M',
        ]);

        // Datos actualizados
        $response = $this->putJson(route('empleado.update', $empleado->id), [
            'nombre' => 'Jane',
            'paterno' => 'Doe',
            'materno' => 'Smith',
            'telefono' => '87654321',
            'direccion' => 'Calle Principal 456',
            'edad' => 28,
            'sexo' => 'F',
        ]);


        $response->assertStatus(200);
        $this->assertDatabaseHas('empleados', ['nombre' => 'Jane', 'telefono' => '87654321']);
    }



}
