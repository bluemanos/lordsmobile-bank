<?php

namespace Tests\Feature;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

/**
 * Class HomeControllerTest
 * @package Tests\Feature
 */
class HomeControllerTest extends TestCase
{
    /** @test **/
    public function dashboard()
    {
        $response = $this->get(route('home'));
        $response->assertStatus(Response::HTTP_FOUND);

        $this->actingAs($this->admin);

        $response = $this->get(route('home'));
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test **/
    public function store_resource()
    {
        $response = $this->post(route('home'));
        $response->assertStatus(Response::HTTP_FOUND);

        $this->actingAs($this->admin);

        $response = $this->post(route('home'), [
            'bank' => 1,
            'amount' => 123000,
            'rss' => 'food',
        ]);
        $response->assertStatus(Response::HTTP_FOUND);

        $this->assertDatabaseHas('resources', [
            'bank_id' => 1,
            'amount' => 123000,
            'rss' => 'food',
        ]);
    }

    /** @test **/
    public function store_resource_as_new_user()
    {
        $response = $this->post(route('home'));
        $response->assertStatus(Response::HTTP_FOUND);

        $this->actingAs($this->admin);

        $response = $this->post(route('home'), [
            'bank' => 1,
            'amount' => 123000,
            'rss' => 'food',
            'nick' => 'new nick',
        ]);
        $response->assertStatus(Response::HTTP_FOUND);

        $this->assertDatabaseHas('resources', [
            'bank_id' => 1,
            'amount' => 123000,
            'rss' => 'food',
        ]);

        $this->assertDatabaseHas('users', [
            'nick' => 'new nick',
        ]);
    }

    /** @test **/
    public function normal_user_cant_create_new_users()
    {
        $this->actingAs($this->user);

        $response = $this->post(route('home'), [
            'bank' => 1,
            'amount' => 123000,
            'rss' => 'food',
            'nick' => 'new nick',
        ]);
        $response->assertStatus(Response::HTTP_FOUND);

        $this->assertDatabaseHas('resources', [
            'bank_id' => 1,
            'amount' => 123000,
            'rss' => 'food',
        ]);

        $this->assertDatabaseMissing('users', [
            'nick' => 'new nick',
        ]);
    }
}
