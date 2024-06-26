<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Cliente;
use App\Models\User;

class ClienteTest extends TestCase

{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_un_cliente()
    {
        // Creamos un usuario y lo autenticamos
        $user = User::factory()->create();

        $this->actingAs($user);

        // Simulamos una solicitud POST al endpoint para crear un cliente
        $respuesta = $this->post(route('cliente.store'), [
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'email' => 'juan.perez@example.com',
            'telefono' => '1234567890',
            'fecha_nacimiento' => '2000-01-01',
            'direccion' => 'Calle Principal 123',
            'ciudad' => 'Ciudad Ejemplo',
            'pais' => 'País Ejemplo',
        ]);

        // Verificamos que la respuesta redirige a la ruta esperada
        $respuesta->assertRedirect(route('cliente.index'));

        // Verificamos que los datos se han guardado en la base de datos
        $this->assertDatabaseHas('clientes', [
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'email' => 'juan.perez@example.com',
            'telefono' => '1234567890',
            'fecha_nacimiento' => '2000-01-01',
            'direccion' => 'Calle Principal 123',
            'ciudad' => 'Ciudad Ejemplo',
            'pais' => 'País Ejemplo',
        ]);
    }

    /** @test */
    public function nombre_es_requerido_para_crear_un_cliente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $respuesta = $this->post(route('cliente.store'), [
            'apellido' => 'Pérez',
            'email' => 'juan.perez@example.com',
            'telefono' => '1234567890',
            'fecha_nacimiento' => '2000-01-01',
            'direccion' => 'Calle Principal 123',
            'ciudad' => 'Ciudad Ejemplo',
            'pais' => 'País Ejemplo',
        ]);

        $respuesta->assertSessionHasErrors('nombre');
    }

    /** @test */
    public function email_debe_tener_un_formato_valido()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $respuesta = $this->post(route('cliente.store'), [
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'email' => 'email-no-valido',
            'telefono' => '1234567890',
            'fecha_nacimiento' => '2000-01-01',
            'direccion' => 'Calle Principal 123',
            'ciudad' => 'Ciudad Ejemplo',
            'pais' => 'País Ejemplo',
        ]);

        $respuesta->assertSessionHasErrors('email');
    }
    /** @test */
    public function puede_actualizar_un_cliente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $cliente = Cliente::factory()->create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
        ]);

        $respuesta = $this->put(route('cliente.update', $cliente), [
            'nombre' => 'Carlos',
            'apellido' => 'Sánchez',
            'email' => 'carlos.sanchez@example.com',
            'telefono' => '0987654321',
            'fecha_nacimiento' => '1990-01-01',
            'direccion' => 'Calle Secundaria 456',
            'ciudad' => 'Otra Ciudad',
            'pais' => 'Otro País',
        ]);

        $respuesta->assertRedirect(route('cliente.index'));

        $this->assertDatabaseHas('clientes', [
            'id' => $cliente->id,
            'nombre' => 'Carlos',
            'apellido' => 'Sánchez',
        ]);
    }

    /** @test */
    public function puede_eliminar_un_cliente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $cliente = Cliente::factory()->create();

        $respuesta = $this->delete(route('cliente.destroy', $cliente));

        $respuesta->assertRedirect(route('cliente.index'));

        $this->assertDatabaseMissing('clientes', ['id' => $cliente->id]);
    }

     /** @test */
     public function usuario_no_autenticado_no_puede_crear_un_cliente()
     {
         $respuesta = $this->post(route('cliente.store'), [
             'nombre' => 'Juan',
             'apellido' => 'Pérez',
             'email' => 'juan.perez@example.com',
             'telefono' => '1234567890',
             'fecha_nacimiento' => '2000-01-01',
             'direccion' => 'Calle Principal 123',
             'ciudad' => 'Ciudad Ejemplo',
             'pais' => 'País Ejemplo',
         ]);

         $respuesta->assertRedirect(route('login'));
     }

     /** @test */
    public function puede_ver_la_lista_de_clientes()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $clientes = Cliente::factory()->count(3)->create();

        $respuesta = $this->get(route('cliente.index'));

        $respuesta->assertStatus(200);
        foreach ($clientes as $cliente) {
            $respuesta->assertSee($cliente->nombre);
        }
    }

}
