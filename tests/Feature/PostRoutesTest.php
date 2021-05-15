<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

use Illuminate\Http\Request;

/**
 *  Тест проверяет, что post запросы рассчитанные на пользователя с ролью Admin не выдают 500 ошибку
 */
class PostRoutesTest extends TestCase
{
    /** @test */
    public function getTableAllPostsTest()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->post('/getTableAllPosts', 
                                [
                                    '_token' => csrf_token(),
                                    'page'   => 1
                                ]
                            );
        $response->assertStatus(200);
    }

    /** @test */
    public function deletePostTest()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->post('/deletePost', 
                                [
                                    '_token' => csrf_token(),
                                    'id'     => 1
                                ]
                            );
        $response->assertStatus(200);
    }

    /** @test */
    public function updatePostTest()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->post('/updatePost', 
                                [
                                    '_token'  => csrf_token(),
                                    'id'      => 1,
                                    'title'   => 'feature test',
                                    'content' => 'feature test',
                                    'publish' => 1
                                ]
                            );
        $response->assertStatus(200);
    }

    /** @test */
    public function addPostTest()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->post('/addPost', 
                                [
                                    '_token' => csrf_token(),
                                    'title'   => 'feature test',
                                    'content' => 'feature test',
                                    'publish' => 1
                                ]
                            );
        $response->assertStatus(200);
    }

    /** @test */
    public function getPluginsTest()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->post('/getPlugins', ['_token' => csrf_token()]);
        $response->assertStatus(200);
    }

    /** @test */
    public function deletePluginTest()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->post('/deletePlugin', 
                                [
                                    '_token' => csrf_token(),
                                    'id'      => 1
                                ]
                            );
        $response->assertStatus(200);
    }

    /** @test */
    public function installPluginTest()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->post('/installPlugin', 
                                [
                                    '_token' => csrf_token(),
                                    'id'      => 1
                                ]
                            );
        $response->assertStatus(200);
    }
  
}
