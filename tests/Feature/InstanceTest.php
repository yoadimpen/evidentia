<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class InstanceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    //use RefreshDatabase;

    public function testSettingUp() :void {

        DB::connection()->getPdo()->exec("DROP DATABASE IF EXISTS `homestead`;");
        DB::connection()->getPdo()->exec("DROP DATABASE IF EXISTS `basetest`;");
        DB::connection()->getPdo()->exec("CREATE DATABASE IF NOT EXISTS `homestead`");
        DB::connection()->getPdo()->exec("ALTER SCHEMA `homestead`  DEFAULT CHARACTER SET utf8mb4  DEFAULT COLLATE utf8mb4_unicode_ci");
        exec("php artisan migrate");
        exec("php artisan db:seed");
        exec('php artisan db:seed --class=InstancesTableSeeder');

        $this->assertTrue(true);

    }

    public function testHome()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testDefautInstanceWithoutLogged()
    {
        $response = $this->get('/20');
        $response->assertStatus(302);
    }

    public function testAdminLoginFalse()
    {
        $request = [
            'email' => 'incorrect',
            'password' => 'incorrect'
        ];

        $response = $this->post('login',$request);

        $response->assertSessionHasErrors();
    }

    public function testAdminLoginTrue()
    {
        $request = [
            'email' => 'admin@admin.com',
            'password' => 'admin'
        ];

        $response = $this->post('login',$request);

        $response->assertSessionDoesntHaveErrors();
    }

    public function testListInstances()
    {
        $this->testAdminLoginTrue();

        $response = $this->get('/admin/instance/manage');
        $response->assertStatus(200);
    }

    public function testCreateInstance()
    {
        $this->testAdminLoginTrue();

        $request = [
            'name' => 'Nuevo curso',
            'route' => '21',
            'host' => env("DB_HOST"),
            'port' => env('DB_PORT'),
            'database' => 'basetest',
            'username' => 'homestead',
            'password' => 'secret',
        ];

        $response = $this->post('admin/instance/new',$request);

        //$response->assertOk();

        $response->assertStatus(200);
    }

    public function testRemoveInstance()
    {
        $this->withoutExceptionHandling();
        $this->testAdminLoginTrue();

        $request = [
            'name' => 'Nuevo curso',
            'id' => 2
        ];

        $response = $this->post('admin/instance/manage/remove',$request);
        $response->assertStatus(302);
    }
}
