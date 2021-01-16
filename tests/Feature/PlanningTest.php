<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestView;
use Tests\TestCase;

class PlanningTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //tests

    public function testSecretarioLoginTrue()
    {
        $request = [
            'username'=> 'secretario1',
            'password' => 'secretario1'
        ];

        $response = $this->post('/login_p',$request);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testNewPlanning(){

        $this->testSecretarioLoginTrue();

        $request = [
            'title' => 'This a tryal meeting planning',
            'datetime' => '2021-01-16 03:24:35',
            'place' => 'Univertisty',
            'type' => 'ORDINARY'
        ];

        $response = $this->post('/meetingplanning/new',$request);

        $response->assertStatus(302);

    }

    public function testNewPlanningDateError(){

        $this->testSecretarioLoginTrue();

        $request = [
          'title' => 'This a tryal meeting planning',
          'datetime' => 'Not a date',
          'place' => 'Univertisty',
          'type' => 'ORDINARY'
        ];

        $response = $this->post('/meetingplanning/new',$request);

        ($response->assertSessionHasNoErrors())==false;

    }

    public function testUpdatePlanning(){

        $this->testSecretarioLoginTrue();

        $request = [
          'id' => '1',
          'title' => 'This a prueba meeting planning',
          'datetime' => '2021-01-16 03:24:35',
          'place' => 'Univertisty',
          'type' => 'ORDINARY'
        ];

        $response = $this->post('/meetingplanning/save',$request);

        $response->assertStatus(302);

    }

    public function testDeletePlanning(){

        $this->testSecretarioLoginTrue();

        $request = [
            'id' => '1'
        ];

        $response = $this->post('/meetingplanning/remove',$request);

        /*$view = $this->view('contact.list');

        $view->assertSee('Contacto eliminado con éxito!');*/

        $response->assertStatus(302);

    }

}
