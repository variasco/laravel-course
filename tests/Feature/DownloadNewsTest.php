<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DownloadNewsTest extends TestCase
{
    public function test_download_news()
    {
        $response = $this->post('/admin/download_news');

        $response->assertDownload("news.json");
    }
}
