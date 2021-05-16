<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 *  Тест проверяет что страницы все url пути рабочие,
 *  т.е. способны вернуть ответ при благоприятных условиях 
 *  (пропускается авторизация, права доступа, валидация данных)
 */
class GetRoutesTest extends TestCase
{

    /** @test */
    public function mainPageTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function postPageTest()
    {
        $response = $this->get('/post');
        $response->assertStatus(200);
    }

    /** @test */
    public function getpostsTest()
    {
        $response = $this->withSession(['banned' => false])
                         ->post('/getposts', 
                                [
                                    '_token' => csrf_token(),
                                    'page'   => 1
                                ]
                            );
        $response->assertStatus(200);
    }

    /** @test */
    public function getonepostTest()
    {
        $response = $this->withSession(['banned' => false])
                         ->post('/getonepost', 
                                [
                                    '_token' => csrf_token(),
                                    'id'     => 2
                                ]
                            );
        $response->assertStatus(200);
    }

    /** @test */
    public function getCommentsTest()
    {
        $response = $this->withSession(['banned' => false])
                         ->post('/getComments', 
                                [
                                    '_token' => csrf_token(),
                                    'id'     => 2
                                ]
                            );
        $response->assertStatus(200);
    }

    /** @test */
    public function createPostTest()
    {
        $this->withoutMiddleware();
        $response = $this->get('/createPost');
        $response->assertStatus(200);
    }

    /** @test */
    public function updPostPageTest()
    {
        $this->withoutMiddleware();
        $response = $this->get('/updPost');
        $response->assertStatus(200);
    }

    /** @test */
    public function adminAllPostsPageTest()
    {
        $this->withoutMiddleware();
        $response = $this->get('/adminAllPosts');
        $response->assertStatus(200);
    }

    /** @test */
    public function pluginsPageTest()
    {
        $this->withoutMiddleware();
        $response = $this->get('/plugins');
        $response->assertStatus(200);
    }

    /** @test */
    public function dashboardPageTest()
    {
        $this->withoutMiddleware();
        $response = $this->get('/dashboard');
        $response->assertStatus(200);
    }
}
