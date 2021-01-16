<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestView;
use Tests\TestCase;

class ValorationTest extends TestCase
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
            'username'=> 'alumno1',
            'password' => 'alumno1'
        ];

        $response = $this->post('/login_p',$request);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testNewValoration(){

        $this->testAlumnoLoginTrue();

        $request = [
            'title' => 'Valoracion 1',
            'description' => 'Descripcion de la valoracion 1',
            'date' => '2021/01/05',
            'qualification' =>'4',
        ];

        $response = $this->post('/valoration/new',$request);

        $response->assertStatus(302);

    }

    public function testNewAlumnoDateError(){

        $this->testAlumnoLoginTrue();

        $request = [
            'title' => 'Valoracion 2',
            'description' => 'Descripción de la valoracion 2',
            'date' => 'Esto no es una fecha',
            'qualification' =>'11',
        ];

        $response = $this->post('/valoration/new',$request);

        ($response->assertSessionHasNoErrors())==false;

    }

    public function testUpdateValoration(){

        $this->testAlumnoLoginTrue();

        $request = [
            'id' => '2',
            'title' => 'Valoracion 3',
            'description' => 'Descripción de la valoracion 3',
            'date' => '2020/12/05',
            'qualification' =>'2',
        ];

        $response = $this->post('/valoration/save',$request);

        $response->assertStatus(302);

    }
    public function testUpdateValorationQualificationError(){

        $this->testAlumnoLoginTrue();

        $request = [
            'id' => '2',
            'title' => 'Valoracion 3',
            'description' => 'Descripción de la valoracion 3',
            'date' => '2020/12/05',
            'qualification' =>'1000',
        ];

        $response = $this->post('/valoration/save',$request);

        ($response->assertSessionHasNoErrors())==false;

    }

    public function testDeleteValoration(){

        $this->testAlumnoLoginTrue();

        $request = [
            'id' => '2'
        ];

        $response = $this->post('/valoration/remove',$request);
        $response->assertStatus(302);

    }

}
