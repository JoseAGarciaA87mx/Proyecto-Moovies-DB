<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProyectoCreacionDeRegistroTest extends TestCase
{
    use RefreshDatabase;
     /** @test */
    public function siendo_usuario_X_al_enviar_petición_POST_aseguro_creación_de_registro_en_DB_y_redireccionamiento(): void
    {
        $user_x = User::factory()->create();
        $this->actingAs($user_x);

        $data = [
            'name' => 'Desconocido', 
            'country' => 'Desconocido', 
            'birthdate' => '1900-01-01',
        ];
    
        $response = $this->post('/directors', $data);
    
        $response->assertRedirect('directors/1');
    
        $this->assertDatabaseHas('directors', [
            'dir_name' => 'Desconocido', 
            'dir_country' => 'Desconocido', 
            'dir_birthdate' => '1900-01-01',
        ]);
    }

    /** @test */
    public function siendo_usuario_X_al_enviar_petición_POST_con_información_incorrecta_o_faltante_asegurar_error_en_validación(): void
    {
        $user_x = User::factory()->create();
        $this->actingAs($user_x);
        $this->assertAuthenticated();

        $data = [
            'name' => 'Desconocido', 
            'country' => 'Desconocido-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 
            'birthdate' => null,
        ];
    
        $response = $this->post('/directors', $data);
    
        $response->assertSessionHasErrors([
            'country', 'birthdate'
        ]);
    }
}
