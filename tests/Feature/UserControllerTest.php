<?php

namespace Tests\Feature;

use App\Model\Resource;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

/**
 * Class UserControllerTest
 * @package Tests\Feature
 */
class UserControllerTest extends TestCase
{
    /** @test **/
    public function list()
    {
        $response = $this->get(route('user.list'));
        $response->assertStatus(Response::HTTP_FOUND);

        $this->actingAs($this->user);
        $response = $this->get(route('user.list'));
        $response->assertStatus(Response::HTTP_FORBIDDEN);

        $this->actingAs($this->admin);
        $response = $this->get(route('user.list'));
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test **/
    public function profile()
    {
        $response = $this->get(route('user.profile', ['user' => 2]));
        $response->assertStatus(Response::HTTP_FOUND);

        $this->actingAs($this->user);
        $response = $this->get(route('user.profile', ['user' => 2]));
        $response->assertStatus(Response::HTTP_OK);

        $response = $this->get(route('user.profile', ['user' => 1]));
        $response->assertStatus(Response::HTTP_FORBIDDEN);

        $this->actingAs($this->admin);
        $response = $this->get(route('user.profile', ['user' => 2]));
        $response->assertStatus(Response::HTTP_OK);
    }
}
