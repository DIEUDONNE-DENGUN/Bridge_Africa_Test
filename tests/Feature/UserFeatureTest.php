<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowLoginPage()
    {
        $response = $this->get('login');

        $response->assertStatus(200);
    }

    public function testShowSignUpPage()
    {
        $response = $this->get('register');

        $response->assertStatus(200);
    }
}
