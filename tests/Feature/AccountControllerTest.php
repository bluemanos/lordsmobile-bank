<?php

namespace Tests\Feature;

use App\Model\Resource;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

/**
 * Class AccountControllerTest
 * @package Tests\Feature
 */
class AccountControllerTest extends TestCase
{
    /** @test **/
    public function account()
    {
        $response = $this->get(route('user.account'));
        $response->assertStatus(Response::HTTP_FOUND);

        $this->actingAs($this->user);
        $response = $this->get(route('user.account'));
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test **/
    public function account_save()
    {
        $response = $this->post(route('user.account'), [
            'nick' => 'xxx',
            'name' => 'yyy',
        ]);
        $response->assertStatus(Response::HTTP_FOUND);

        $this->actingAs($this->user);
        $response = $this->post(route('user.account'), [
            'nick' => 'xxx',
            'name' => 'yyy',
        ]);
        $response->assertStatus(Response::HTTP_FOUND);

        $this->assertEquals('xxx', $this->user->nick);
        $this->assertEquals('yyy', $this->user->name);
    }
}
