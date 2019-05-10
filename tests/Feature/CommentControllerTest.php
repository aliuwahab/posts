<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentControllerTest extends TestCase
{
    /**
     * @test
     */
    public function shouldReturnAllComments()
    {
        $response = $this->get('/comments');
        $response->assertStatus(200);
        $response->assertJsonCount(500);
    }

    /**
     * @test
     */
    public function shouldReturnSingleCommentWithMatchingId()
    {
        $response = $this->get('/comments/245');
        $response->assertStatus(200);
        $response->assertJson([
            'postId' => 49,
            'id' => 245,
            'name'=> "et rerum fuga blanditiis provident eligendi iste eos",
            'email'=> "Litzy@kaylie.io",
        ]);
    }
}
