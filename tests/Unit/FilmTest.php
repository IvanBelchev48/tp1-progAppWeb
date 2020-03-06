<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class FilmTest extends TestCase
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

        $film = factory(App\Film::class)->make();
    }
    public function test_create_film()
    {
        $data = [
            'title' => $faker->sentence,
            'release_year' => 2001,
            'length' => 100,
            'description' => $faker->paragraph,
            'rating' => 'G',
            'language_id' => 1,
            'special_features' => $faker->text,
            'image' => $faker->text,
        ];

        $this->post(route('films.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    public function test_update_film()
    {
        $film = factory(Film::class)->create();

        $data = [
            'title' => $faker->sentence,
            'release_year' => 2001,
            'length' => 100,
            'description' => $faker->paragraph,
            'rating' => 'G',
            'language_id' => 1,
            'special_features' => $faker->text,
            'image' => $faker->text,
        ];

        $this->put(route('films.update', $film->id), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }

    public function test_show_film()
    {
        $film = factory(Film::class)->create();

        $this->put(route('films.show', $film->id))
            ->assertStatus(200);
    }

    public function test_delete_film()
    {
        $film = factory(Film::class)->create();

        $this->delete(route('films.delete', $film->id))
            ->assertStatus(204);
    }

    public function test_index_film()
    {
        $film = factory(Film::class, 2)->create()->map(function ($film){
            return $film->only(['id', 'title', 'release_year', 'length', 'description', 'rating', 'language_id', 'special_features', 'image']);
        });

        $this->get(route('films'))
            ->assertStatus(200)
            ->assertJson($film->toArray())
            ->assertJsonStructure([
                '*' => ['id', 'title', 'release_year', 'length', 'description', 'rating', 'language_id', 'special_features', 'image'],
            ]);
    }

    public function test_store_actor_with_invalid_data()
    {
        $data = [
            'title' => '',
            'release_year' => '',
            'length' => '',
            'description' => '',
            'rating' => '',
            'language_id' => '',
            'special_features' => '',
            'image' => '',
        ];

        $this->post(route('films.store'), $data)
            ->assertStatus(422);
    }
}
