<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostControllerTest extends TestCase
{
    /**
     * @test
     */
    public function shouldReturnAllPosts()
    {
        $response = $this->get('/posts');
        $response->assertStatus(200);
        $response->assertJsonCount(100);
    }

    /**
     * @test
     */
    public function shouldReturnSinglePostWithMatchingId()
    {
        $response = $this->get('/posts/20');
        $response->assertStatus(200);
        $response->assertJson([
            'userId' => 2,
            'id' => 20,
            'title' => "doloribus ad provident suscipit at",
        ]);
    }

    /**
     * @test
     */
    public function shouldReturnCommentsOfThePostWithMatchingId()
    {
        $response = $this->get('/posts/85/comments');
        $response->assertStatus(200);
        $response->assertJsonCount(5);
    }
}
