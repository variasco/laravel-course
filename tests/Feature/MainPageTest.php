<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MainPageTest extends TestCase
{
    public function test_app_main_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText("Добро пожаловать");
    }
}
