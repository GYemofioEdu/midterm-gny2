<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PagesTest extends TestCase
{
    /**
     * This class is dedicated to pages/uri (get) tests
     *
     * @return void
     */
    public function testRegisterPage()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function testLoginPage()
    {
        $response = $this->get(route('login') );
        $response->assertStatus(200);
    }

    public function testAboutPage()
    {
        $response = $this->get(route('about'));
        $response->assertStatus(200);
    }

    public function testContactPage()
    {
        $response = $this->get(route('contact'));
        $response->assertStatus(200);
    }
}
