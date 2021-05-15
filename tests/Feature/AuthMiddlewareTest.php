<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 *  Тест проверяет, что неавторизованный пользователь получает редирект при посещении страниц требующих авторизации 
 */
class AuthMiddlewareTest extends TestCase
{
    /** @test */
    public function createPostTest()
    {
        $response = $this->get('/createPost');
        $response->assertStatus(302);
    }

    /** @test */
    public function updPostPageTest()
    {
        $response = $this->get('/updPost');
        $response->assertStatus(302);
    }

    /** @test */
    public function adminAllPostsPageTest()
    {
        $response = $this->get('/adminAllPosts');
        $response->assertStatus(302);
    }

    /** @test */
    public function pluginsPageTest()
    {
        $response = $this->get('/plugins');
        $response->assertStatus(302);
    }

    /** @test */
    public function dashboardPageTest()
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(302);
    }
}
