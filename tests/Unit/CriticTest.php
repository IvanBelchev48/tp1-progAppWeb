<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CriticTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        passport::actingAs(
            User::find(1)
        );

        $critic = factory(App\Critic::class)->make();
    }
    public function test_create_critic()
    {
        $data = [
            'user_id' => 1,
            'film_id' => 2,
            'score' => 5,
            'comment' => $this->faker->text,
        ];

        $this->post(route('critics.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    public function test_update_critic()
    {
        $critic = factory(Critic::class)->create();

        $data = [
            'user_id' => 1,
            'film_id' => 2,
            'score' => 5,
            'comment' => $this->faker->text,
        ];
        $this->put(route('critics.update', $critic->id), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }

    public function test_show_critic()
    {
        $critic = factory(Critic::class)->create();

        $this->put(route('critics.show', $critic->id))
            ->assertStatus(200);
    }

    public function test_delete_critic()
    {
        $critic = factory(Critic::class)->create();

        $this->delete(route('critics.delete', $critic->id))
            ->assertStatus(204);
    }

    public function test_index_critics()
    {
        $critic = factory(Critic::class, 2)->create()->map(function ($critic){
            return $critic->only(['user_id', 'film_id', 'score', 'comment']);
        });

        $this->get(route('critics'))
            ->assertStatus(200)
            ->assertJson($critic->toArray())
            ->assertJsonStructure([
                '*' => ['user_id', 'film_id', 'score', 'comment'],
            ]);
    }

    public function test_store_critic_with_invalid_data()
    {
        $data = [
            'user_id' => '',
            'film_id' => '',
            'score' => '',
            'comment' => '',
        ];

        $this->post(route('critics.store'), $data)
            ->assertStatus(422);
    }

}
