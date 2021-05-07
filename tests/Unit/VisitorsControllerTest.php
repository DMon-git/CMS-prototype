<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class VisitorsControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function getToPageTest()
    {

        $this->withoutMiddleware();
        $response = $this->post('/getposts', ['page' => 1]);

        $response->assertStatus(200);
        /*
        $this->expectOutputString('');
        $data = Post::getToPage(1);
        var_dump(json_encode($data));
        */
    }
}
