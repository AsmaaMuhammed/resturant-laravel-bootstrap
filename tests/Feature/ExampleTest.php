<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Dish;
use App\Models\Event;
use App\Models\News;
use App\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testBlogTest()
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);
    }
    public function testEventsTest()
    {
        $response = $this->get('/events');

        $response->assertStatus(200);
    }
    public function testMenuTest()
    {
        $response = $this->get('/menu');

        $response->assertStatus(200);
    }
    public function testContactTest()
    {
        $response = $this->get('/contacts');

        $response->assertStatus(200);
    }
    public function testAddCommentTest()
    {
        $response = $this->followingRedirects()->post('/add-comment',[
            '_token' => csrf_token(),
            'name'=>'kkk',
            'phone'=>'3528329',
            'email'=>'kkokyodd@test.com',
            'type'=>'dish',
            'type_id'=>Dish::all()->first()->id,
            'comment'=>'php unit test',

        ]);
        //$response->assertStatus(200);
    }
//    public function testReplyTest()
//    {
//        $response = $this->post('/reply');
//
//        $response->assertRedirect(200);
//    }
    public function testShareTest()
    {
        $response = $this->get('/share');

        $response->assertStatus(200);
    }
}
