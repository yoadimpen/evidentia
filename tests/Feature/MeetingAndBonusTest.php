<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestView;
use Tests\TestCase;

class MeetingAndBonusTest extends TestCase
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

    public function testCreateMeetingMaxHours(){

        $this->testSecretarioLoginTrue();

        $request = [
            'title' => 'Crear reunion con incidencia solucionada - test',
            'datetime' => '2020-12-20 11:40:25',
            'place' => 'Universidad de Sevilla',
            'type' => 'ORDINARIA',
            'hours' => '25'
        ];

        $response = $this->post('/meeting/new',$request);

        $response->assertStatus(302);

    }

    public function testUpdateMeetingMaxHours(){

        $this->testSecretarioLoginTrue();

        $request = [
            'title' => 'Hola muy buenas',
            'datetime' => '2021-01-14 20:25:00',
            'place' => 'Mozambique',
            'type' => 'ORDINARIA',
            'hours' => '25'
        ];

        $response = $this->post('/meeting/save',$request);

        $response->assertStatus(302);

    }

    public function testCreateBonusMaxHours(){

        $this->testSecretarioLoginTrue();

        $request = [
            'reason' => 'Borrado de las horas imputadas',
            'hours' => '40'
        ];

        $response = $this->post('/bonus/new',$request);

        $response->assertStatus(302);

    }

    public function testUpdateBonusMaxHours(){

        $this->testSecretarioLoginTrue();

        $request = [
            'reason' => 'Borrado de las horas imputadas',
            'hours' => '42'
        ];

        $response = $this->post('/bonus/save',$request);

        $response->assertStatus(302);

    }
}