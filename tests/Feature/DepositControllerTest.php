<?php

namespace Tests\Feature;

use App\Model\Resource;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

/**
 * Class DepositControllerTest
 * @package Tests\Feature
 */
class DepositControllerTest extends TestCase
{
    /** @test **/
    public function index()
    {
        $response = $this->get(route('deposit.index'));
        $response->assertStatus(Response::HTTP_FOUND);

        $this->actingAs($this->user);
        $response = $this->get(route('deposit.index'));
        $response->assertStatus(Response::HTTP_FORBIDDEN);

        $this->actingAs($this->admin);
        $response = $this->get(route('deposit.index'));
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test **/
    public function toAcceptForm()
    {
        $response = $this->get(route('deposit.to-accept'));
        $response->assertStatus(Response::HTTP_FOUND);

        $this->actingAs($this->user);
        $response = $this->get(route('deposit.to-accept'));
        $response->assertStatus(Response::HTTP_FORBIDDEN);

        $this->actingAs($this->admin);
        $response = $this->get(route('deposit.to-accept'));
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test **/
    public function toAcceptProcess()
    {
        $response = $this->put(route('deposit.to-accept'));
        $response->assertStatus(Response::HTTP_FOUND);

        $this->actingAs($this->user);
        $response = $this->put(route('deposit.to-accept'), [
            'rss' => 1
        ]);
        $response->assertStatus(Response::HTTP_FORBIDDEN);

        $this->actingAs($this->admin);
        $response = $this->put(route('deposit.to-accept'), [
            'rss' => 1
        ]);
        $response->assertNotFound();

        $rss = factory(Resource::class)->create([
            'accepted_by' => null,
        ]);
        $response = $this->put(route('deposit.to-accept'), [
            'rss' => $rss->id
        ]);
        $response->assertStatus(Response::HTTP_FOUND);

        $this->assertDatabaseHas('resources', [
            'id' => $rss->id,
            'accepted_by' => $this->admin->id,
        ]);
    }
}
