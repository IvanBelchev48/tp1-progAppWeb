<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Passport\Passport;
use App\User;

class ActorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function setUp(): void
    {

    }
    public function testDatabase()
    {
        passport::actingAs(
            User::find(1)
        );
        $actor = factory(App\Actor::class)->make();


        //$this->assertDatabaseHas($table, array $data);
    }

    public function test_get_all_actors()
    {
        $this->json('GET', '/api/actors')
            ->assertStatus(200);

        $response->assertStatus(200);
    }

    public function test_get_actor_by_id()
    {
        $id = 1;
        $this->json('GET', '/api/actors', $id)
            ->assertStatus(200)
            ->assertJson(['id' => 1]);

        $response->assertStatus(200);
    }

    public function test_store_new_actor()
    {
        $this->json('POST', '/api/actors')
            ->assertStatus(200);
    
        $response->assertStatus(200);
    }
}
