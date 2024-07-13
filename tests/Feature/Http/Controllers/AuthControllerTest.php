<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function login_displays_the_login_form()
{
    $response = $this->get(route('login'));
    $response->assertStatus(200);
    $response->assertViewIs('login');
}

public function login_displays_validation_errors()
{
    $response = $this->post('login', []);
    $response->assertStatus(302);
    $response->assertSessionHasErrors('email');
}
}
