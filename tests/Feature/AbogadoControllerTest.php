<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Abogado;

class AbogadoControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_store_a_new_abogado()
    {
        $data = [
            'ci' => '123456',
            'nombre' => 'John Doe',
            'sexo' => 'male',
            'telefono' => '123456789',
            'email' => 'john@example.com',
            'domicilio' => '123 Main St',
        ];

        $response = $this->post(route('abogado.store'), $data);

        $this->assertCount(1, Abogado::all());
        $response->assertRedirect(route('abogado.index'));
    }

    /** @test */
    public function it_can_update_an_abogado()
    {
        $abogado = Abogado::factory()->create();

        $data = [
            'ci' => '789012',
            'nombre' => 'Jane Doe',
            'sexo' => 'female',
            'telefono' => '987654321',
            'email' => 'jane@example.com',
            'domicilio' => '456 Elm St',
        ];

        $response = $this->put(route('abogado.update', $abogado), $data);

        $abogado->refresh();

        $this->assertEquals('789012', $abogado->ci);
        $this->assertEquals('Jane Doe', $abogado->nombre);
        $this->assertEquals('female', $abogado->sexo);
        $this->assertEquals('987654321', $abogado->telefono);
        $this->assertEquals('jane@example.com', $abogado->email);
        $this->assertEquals('456 Elm St', $abogado->domicilio);

        $response->assertRedirect(route('abogado.index'));
    }


}
