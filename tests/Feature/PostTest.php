<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test get Posts.
     *
     * @return void
     */
    public function testGetPosts()
    {
        $user = factory(Post::class)->create();
        $response = $this->json('GET', '/api/post');
        $response->assertStatus(200)
            ->assertJsonStructure([[
                'id',
                'user_id',
                'title',
                'content',
                'created_at',
                'active',
            ]]);
    }
}
