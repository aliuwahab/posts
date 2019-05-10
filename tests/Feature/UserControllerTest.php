<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    /**
     * @test
     */
    public function shouldReturnAllUsers()
    {
        $response = $this->get('/users');
        $response->assertStatus(200);
        $response->assertJsonCount(10);
    }

    /**
     * @test
     */
    public function shouldReturnSingleUserWithMatchingId()
    {
        $response = $this->get('/users/2');
        $response->assertStatus(200);
        $response->assertJson([
            'id' => 2,
            'name' => "Ervin Howell",
            'username' => "Antonette",
            'email' => "Shanna@melissa.tv",
        ]);
    }

    /**
     * @test
     */
    public function shouldReturnPostsOfTheUserWithMatchingId()
    {
        $response = $this->get('/users/2/posts');
        $response->assertStatus(200);
        $response->assertJsonCount(10);
    }
}
