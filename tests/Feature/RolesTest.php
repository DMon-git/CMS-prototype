<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

use Illuminate\Http\Request;

/**
 *  Тест проверяет, что с пользователь с ролью User получит ошибку прав доступа 403
 *  для страниц и действий предназначенных для пользователя с ролью Admin
 */
class RolesTest extends TestCase
{
    /** @test */
    public function createPostTest()
    {
        $user = User::find(2);

        $response = $this->actingAs($user)->get('/createPost');
        $response->assertStatus(403);
    }

    /** @test */
    public function updPostPageTest()
    {
        $user = User::find(2);

        $response = $this->actingAs($user)->get('/updPost');
        $response->assertStatus(403);
    }

    /** @test */
    public function adminAllPostsPageTest()
    {
        $user = User::find(2);

        $response = $this->actingAs($user)->get('/adminAllPosts');
        $response->assertStatus(403);
    }

    /** @test */
    public function pluginsPageTest()
    {
        $user = User::find(2);

        $response = $this->actingAs($user)->get('/plugins');
        $response->assertStatus(403);
    }

    /** @test */
    public function getTableAllPostsTest()
    {
        $user = User::find(2);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->post('/getTableAllPosts', ['_token' => csrf_token()]);
        $response->assertStatus(403);
    }

    /** @test */
    public function deletePostTest()
    {
        $user = User::find(2);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->post('/deletePost', ['_token' => csrf_token()]);
        $response->assertStatus(403);
    }

    /** @test */
    public function updatePostTest()
    {
        $user = User::find(2);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->post('/updatePost', ['_token' => csrf_token()]);
        $response->assertStatus(403);
    }

    /** @test */
    public function addPostTest()
    {
        $user = User::find(2);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->post('/addPost', ['_token' => csrf_token()]);
        $response->assertStatus(403);
    }

    /** @test */
    public function getPluginsTest()
    {
        $user = User::find(2);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->post('/getPlugins', ['_token' => csrf_token()]);
        $response->assertStatus(403);
    }

    /** @test */
    public function installPluginTest()
    {
        $user = User::find(2);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->post('/installPlugin', ['_token' => csrf_token()]);
        $response->assertStatus(403);
    }

    /** @test */
    public function deletePluginTest()
    {
        $user = User::find(2);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->post('/deletePlugin', ['_token' => csrf_token()]);
        $response->assertStatus(403);
    }

    /** @test */
    public function getuserinfoTest()
    {
        $user = User::find(2);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->post('/getuserinfo', ['_token' => csrf_token()]);
        $response->assertStatus(200);
    }

    /** @test */
    public function addCommentTest()
    {
        $user = User::find(2);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->post('/addComment', 
                                [
                                    '_token'  => csrf_token(),
                                    'id_post' => 2,
                                    'comment' => "feature test"
                                ]
                            );
        $response->assertStatus(200);
    }

    /*
        

    */
}
