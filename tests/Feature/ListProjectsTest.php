<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\Project;
use App\Models\User; 
use Tests\TestCase;

class ListProjectsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_all_projects()
    {
        $this->withoutExceptionHandling();

        // Crea tres usuarios de prueba
        $users = User::factory()->times(3)->create();

        //Setup
        $project1 = Project::factory()->create();

        $project2 = Project::factory()->create();

        foreach ($users as $user) {
            $this->actingAs($user);

            $response = $this->get('/portafolio'); // Cambiado de 'projects.index' a '/portafolio'

            $response->assertStatus(200);

            $response->assertSee($project1->tittle); // Usar 'tittle' en lugar de 'title'
            $response->assertSee($project2->tittle); // Usar 'tittle' en lugar de 'title'
        }
    }
}