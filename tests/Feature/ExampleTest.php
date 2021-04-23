<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Testing\TestResponse;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_login_request()
    {
        $response = $this->get('login');

        $response->assertViewIs('login');
    }
    /*
    public function test_home_request_with_logged_user()
    {
        $posts = [];
        $posts[0] = new Post();
        $posts[0]->username = 'me';
        $posts[0]->content = "mocking post";
        $posts[0]->created_at = "2021-04-22 14:54:15";

        $client_mock = \Mockery::mock('App\Models\Post');
        $client_mock->shouldReceive('findAll')->andReturn($posts);

        $response = $this->withSession(['id' => 3])->get('home');

        $response->assertViewIs('home');
        
    }*/
    public function test_home_request_with_notlogged_user()
    {
        $response = $this->get('home');

        $response->assertViewIs('login');
    }

}
