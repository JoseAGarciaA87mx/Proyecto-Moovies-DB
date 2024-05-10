<?php

namespace Tests\Feature;

use App\Models\Director;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProyectoEliminaciónDeRegistroTest extends TestCase
{
    /** @test */
    public function siendo_usaurio_X_al_enviar_petición_DELETE_aseguro_eliminación_de_registro_en_DB_y_redireccionamiento(): void
    {
        $user_x = User::factory()->create();
        $this->actingAs($user_x);
        $this->assertAuthenticated();
        
        $director = Director::create([
            'dir_name' => 'Desconocido', 
            'dir_country' => 'Desconocido', 
            'dir_birthdate' => '1900-01-01',
        ]);

        $response = $this->delete("/directors/{$director->id}");

        $this->assertDatabaseMissing('directors', $director->toArray());
    
        $response->assertRedirect('/directors');
    }
}
