<?php

namespace Tests\Unit;
use App\Models\Producto; // Asegúrate de ajustar el namespace según tu aplicación
use App\Models\User;
use Tests\TestCase;



class ProductoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    /** @test */
    public function puede_crear_un_producto()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $respuesta = $this->post('/producto', [
            'nombre' => 'Producto de Prueba',
            'abreviatura' => 'PRB',
            'descripcion' => 'Descripción del producto de prueba.',
            'precio' => 10.50,
            'stock' => 100,
            'marca' => 'Marca de Prueba',
            'Pais_Origen' => 'País de Prueba',
        ]);

        $respuesta->assertRedirect('/producto'); // Verifica que se redirija a la lista de productos

        $this->assertDatabaseHas('productos', [
            'nombre' => 'Producto de Prueba',
            'abreviatura' => 'PRB',
            'descripcion' => 'Descripción del producto de prueba.',
            'precio' => 10.50,
            'stock' => 100,
            'marca' => 'Marca de Prueba',
            'Pais_Origen' => 'País de Prueba',
        ]);
    }

    /** @test */
    public function nombre_es_requerido_para_crear_un_producto()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $respuesta = $this->post('/producto', [
            // 'nombre' => 'Producto de Prueba', // Nombre no proporcionado
            'abreviatura' => 'PRB',
            'descripcion' => 'Descripción del producto de prueba.',
            'precio' => 10.50,
            'stock' => 100,
            'marca' => 'Marca de Prueba',
            'Pais_Origen' => 'País de Prueba',
        ]);

        $respuesta->assertSessionHasErrors('nombre'); // Verifica que se produzca un error de validación para 'nombre'
    }

    /** @test */
    public function puede_ver_el_formulario_de_creacion_de_productos()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $respuesta = $this->get('/producto/create');

        $respuesta->assertStatus(200); // Verifica que la página de creación de productos cargue correctamente
        $respuesta->assertSee('CREAR REGISTRO DE PRODUCTO'); // Verifica que el título esté presente en la página
        $respuesta->assertSee('Guardar'); // Verifica que el botón Guardar esté presente en la página
    }

    /**
     * Asegura que se validen los campos requeridos al crear un producto.
     */
    /** @test */
    public function valida_campos_requeridos_para_crear_producto()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Intentamos crear un producto sin proporcionar el nombre
        $productoSinNombre = Producto::factory()->make([
            'nombre' => '', // Campo requerido
            'descripcion' => 'Descripción del producto sin nombre.',
            'precio' => 10.50,
            'stock' => 100,
        ]);

        // Simulamos una solicitud POST al endpoint para crear un producto sin nombre
        $respuesta = $this->post('/producto', $productoSinNombre->toArray());

        // Verificamos que la solicitud no se complete y devuelva errores de validación
        $respuesta->assertSessionHasErrors('nombre');
    }

}
