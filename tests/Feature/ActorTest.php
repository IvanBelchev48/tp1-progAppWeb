<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function setUp()
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    public function test_actor_get_actors_by_id()
    {
        $id = 1;
        $this->json('GET', '/api/actors', $id)
            ->assertStatus(200)
            ->assertJson(['id' => 1]);

        $response->assertStatus(200);
    }
}
