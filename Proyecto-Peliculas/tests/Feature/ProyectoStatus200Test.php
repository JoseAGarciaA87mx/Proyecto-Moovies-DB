<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProyectoStatus200Test extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function siendo_usuario_X_al_consultar_ruta_Y_aseguro_código_200_y_se_muestra_un_texto_determinado(): void
    {
        $user_x = User::factory()->create();
        $this->actingAs($user_x);
        $this->assertAuthenticated();

        $response = $this->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSeeText("Por alguna razón varias clases de Tailwind no me agarran.");
    }
}
