<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestView;
use Tests\TestCase;

class ContactTest extends TestCase
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

    public function testNewContact(){

        $this->testAlumnoLoginTrue();

        $request = [
            'name' => 'Teb',
            'surname' => 'Mosby',
            'phone' => '999999999',
            'company' => 'Mosbius Design'
        ];

        $response = $this->post('/contact/new',$request);

        $response->assertStatus(302);

    }

    public function testNewContactPhoneError(){

        $this->testAlumnoLoginTrue();

        $request = [
            'name' => 'Teb',
            'surname' => 'Mosby',
            'phone' => 'this is not a phone',
            'company' => 'Mosbius Design'
        ];

        $response = $this->post('/contact/new',$request);

        ($response->assertSessionHasNoErrors())==false;

    }

    public function testUpdateContact(){

        $this->testAlumnoLoginTrue();

        $request = [
            'id' => '1',
            'name' => 'Clarke',
            'surname' => 'Commander',
            'phone' => '+34 999 99 99 99',
            'company' => 'Skaikru'
        ];

        $response = $this->post('/contact/save',$request);

        $response->assertStatus(302);

    }

    public function testDeleteContact(){

        $this->testAlumnoLoginTrue();

        $request = [
            'id' => '1'
        ];

        $response = $this->post('/contact/remove',$request);

        /*$view = $this->view('contact.list');

        $view->assertSee('Contacto eliminado con éxito!');*/

        $response->assertStatus(302);

    }

}
