<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestView;
use Tests\TestCase;

class IncidentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //tests

    public function testAlumnoLoginTrue()
    {
        $request = [
            'username'=> 'alumno2',
            'password' => 'alumno2'
        ];

        $response = $this->post('/login_p',$request);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testNewIncident(){

        $this->testAlumnoLoginTrue();

        $request = [
            'title' => 'Incidente 1',
            'description' => 'Descripción del incidente 1',
            'date' => '2020/11/29',
            'solution' => 'Solución del incidente 1'
        ];

        $response = $this->post('/incident/new',$request);

        $response->assertStatus(302);

    }

    public function testNewAlumnoDateError(){

        $this->testAlumnoLoginTrue();

        $request = [
            'title' => 'Incidente 2',
            'description' => 'Descripción del incidente 2',
            'date' => 'Esto no es una fecha',
            'solution' => 'Solución del incidente 1'
        ];

        $response = $this->post('/incident/new',$request);

        ($response->assertSessionHasNoErrors())==false;

    }

    public function testUpdateIncident(){

        $this->testAlumnoLoginTrue();

        $request = [
            'id' => '2',
            'title' => 'Incidente 3',
            'description' => 'Descripción del incidente 3',
            'date' => '2020/12/05',
            'solution' => 'Solución del incidente 3'
        ];

        $response = $this->post('/incident/save',$request);

        $response->assertStatus(302);

    }

    public function testDeleteIncident(){

        $this->testAlumnoLoginTrue();

        $request = [
            'id' => '2'
        ];

        $response = $this->post('/incident/remove',$request);

        /*$view = $this->view('incident.list');
        $view->assertSee('Incidente eliminado con éxito!');*/

        $response->assertStatus(302);

    }

}
