<?php

namespace Tests\Unit\Models;

use App\Model\Resource;
use App\Model\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

/**
 * Class ResourceTest
 * @package Tests\Unit\Models
 */
class ResourceTest extends TestCase
{
    /** @test */
    public function resource_model_user_relation()
    {
        $model = factory(Resource::class)->create();

        $this->assertInstanceOf(BelongsTo::class, $model->user());
        $this->assertInstanceOf(User::class, $model->user);
    }

    /** @test */
    public function resource_model_creator_relation()
    {
        $model = factory(Resource::class)->create();

        $this->assertInstanceOf(BelongsTo::class, $model->creator());
        $this->assertInstanceOf(User::class, $model->creator);
    }

    /** @test */
    public function resource_model_food_scope()
    {
        $model = factory(Resource::class, 3)->create([
            'rss' => 'food',
        ]);
        factory(Resource::class, 2)->create([
            'rss' => 'gold',
        ]);

        $this->assertInstanceOf(Builder::class, $model[0]::food());
        $this->assertCount(3, $model[0]::food()->get());
    }

    /** @test */
    public function resource_model_stones_scope()
    {
        $model = factory(Resource::class, 3)->create([
            'rss' => 'stones',
        ]);
        factory(Resource::class, 2)->create([
            'rss' => 'gold',
        ]);

        $this->assertInstanceOf(Builder::class, $model[0]::stones());
        $this->assertCount(3, $model[0]::stones()->get());
    }

    /** @test */
    public function resource_model_timber_scope()
    {
        $model = factory(Resource::class, 3)->create([
            'rss' => 'timber',
        ]);
        factory(Resource::class, 2)->create([
            'rss' => 'gold',
        ]);

        $this->assertInstanceOf(Builder::class, $model[0]::timber());
        $this->assertCount(3, $model[0]::timber()->get());
    }

    /** @test */
    public function resource_model_ore_scope()
    {
        $model = factory(Resource::class, 3)->create([
            'rss' => 'ore',
        ]);
        factory(Resource::class, 2)->create([
            'rss' => 'gold',
        ]);

        $this->assertInstanceOf(Builder::class, $model[0]::ore());
        $this->assertCount(3, $model[0]::ore()->get());
    }

    /** @test */
    public function resource_model_gold_scope()
    {
        $model = factory(Resource::class, 3)->create([
            'rss' => 'gold',
        ]);
        factory(Resource::class, 2)->create([
            'rss' => 'ore',
        ]);

        $this->assertInstanceOf(Builder::class, $model[0]::gold());
        $this->assertCount(3, $model[0]::gold()->get());
    }
}
