<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestView;
use Tests\TestCase;

class EvidenceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //tests

    public function testProfesorLoginTrue()
    {
        $request = [
            'username'=> 'profesor1',
            'password' => 'profesor1'
        ];

        $response = $this->post('/login_p',$request);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testAlumnoLoginTrue()
    {
        $request = [
            'username'=> 'alumno1',
            'password' => 'alumno1'
        ];

        $response = $this->post('/login_p',$request);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testNewEvidence(){

        $this->testAlumnoLoginTrue();

        $request = [
            'title' => 'Evidencia', 
            'description' => 'Evidencia de prueba', 
            'hours' => '5',
            'comittee_id' => '5'
        ];

        $response = $this->post('/evidence/new',$request);

        $response->assertStatus(302);
    }

    public function testNewEvidenceHoursError(){

        $this->testAlumnoLoginTrue();

        $request = [
            'title' => 'Evidencia', 
            'description' => 'Evidencia de prueba', 
            'hours' => '200',
            'comittee_id' => '5'
        ];

        $response = $this->post('/evidence/new',$request);

        ($response->assertSessionHasNoErrors())==false;
    }

}