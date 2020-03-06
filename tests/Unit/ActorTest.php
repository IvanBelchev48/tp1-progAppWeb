<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ActorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        /*passport::actingAs(
            User::find(1)
        );*/

        $actor = factory(App\Actor::class)->make();
    }
    public function test_create_actor()
    {
        passport::actingAs(
            User::find(1)
        );

        $data = [
            'first_name' => $this->faker->sentence,
            'last_name' => $this->faker->sentence,
        ];

        $this->post(route('actors.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    public function test_update_actor()
    {
        passport::actingAs(
            User::find(1)
        );

        $actor = factory(Actor::class)->create();

        $data = [
            'first_name' => $this->faker->sentence,
            'last_name' => $this->faker->sentence,
        ];
        $this->put(route('actors.update', $actor->id), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }

    public function test_show_actor()
    {
        passport::actingAs(
            User::find(1)
        );

        $actor = factory(Actor::class)->create();

        $this->put(route('actors.show', $actor->id))
            ->assertStatus(200);
    }

    public function test_delete_actor()
    {
        passport::actingAs(
            User::find(1)
        );

        $actor = factory(Actor::class)->create();

        $this->delete(route('actors.delete', $actor->id))
            ->assertStatus(204);
    }

    public function test_index_actor()
    {
        passport::actingAs(
            User::find(1)
        );

        $actor = factory(Actor::class, 2)->create()->map(function ($actor){
            return $actor->only(['id', 'first_name', 'last_name']);
        });

        $this->get(route('actors'))
            ->assertStatus(200)
            ->assertJson($actor->toArray())
            ->assertJsonStructure([
                '*' => [ 'id', 'first_name', 'last_name'],
            ]);
    }

    public function test_store_actor_with_invalid_data()
    {
        passport::actingAs(
            User::find(1)
        );

        $data = [
            'first_name' => '',
            'last_name' => '',
        ];

        $this->post(route('actors.store'), $data)
            ->assertStatus(422);
    }

    public function test_store_actor_while_not_authenticated()
    {
        $data = [
            'first_name' => $this->faker->sentence,
            'last_name' => $this->faker->sentence,
        ];

        $this->post(route('actors.store'), $data)
            ->assertStatus(401);
    }

    public function test_delete_actor_while_not_authenticated()
    {
        $actor = factory(Actor::class)->create();

        $this->delete(route('actors.delete', $actor->id))
            ->assertStatus(401);
    }

    public function test_storeactor_while_not_admin()
    {
        passport::actingAs(
            User::find(2)
        );

        $data = [
            'first_name' => $this->faker->sentence,
            'last_name' => $this->faker->sentence,
        ];

        $this->post(route('actors.store'), $data)
            ->assertStatus(403);
    }

    public function test_delete_actor_while_not_admin()
    {
        passport::actingAs(
            User::find(2)
        );

        $actor = factory(Actor::class)->create();

        $this->delete(route('actors.delete', $actor->id))
            ->assertStatus(403);
    }

    public function test_update_actor_while_not_authenticated()
    {
        $actor = factory(Actor::class)->create();

        $data = [
            'first_name' => $this->faker->sentence,
            'last_name' => $this->faker->sentence,
        ];
        $this->put(route('actors.update', $actor->id), $data)
            ->assertStatus(401)
            ->assertJson($data);
    }

    public function test_update_actor_while_not_admin()
    {
        passport::actingAs(
            User::find(2)
        );

        $actor = factory(Actor::class)->create();

        $data = [
            'first_name' => $this->faker->sentence,
            'last_name' => $this->faker->sentence,
        ];
        $this->put(route('actors.update', $actor->id), $data)
            ->assertStatus(403)
            ->assertJson($data);
    }
}
