<?php

namespace Tests\Unit\Models;

use App\Model\Resource;
use App\Model\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

/**
 * Class UserTest
 * @package Tests\Unit\Models
 */
class UserTest extends TestCase
{
    /** @test */
    public function resource_model_user_relation()
    {
        $model = factory(User::class)->create([
            'name' => 'Lech',
            'nick' => 'Taczka',
        ]);

        $this->assertEquals('Lech (Taczka)', $model->fullName);
    }
}
