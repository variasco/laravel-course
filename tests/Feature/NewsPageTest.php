<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\News;

class NewsPageTest extends TestCase
{
    public function test_app_news_page()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
        $response->assertSeeText("Новости");
    }
}
