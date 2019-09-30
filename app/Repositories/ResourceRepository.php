<?php

namespace App\Repositories;

use App\Model\Resource;
use App\Model\User;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ResourceRepository
 * @package App\Repositories
 */
class ResourceRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Resource::class;
    }

    /**
     * @param \Illuminate\Contracts\Auth\Authenticatable|User|null $user
     * @return array
     */
    public function sum(User $user = null)
    {
        $resources = Resource::select(['rss', \DB::raw('SUM(amount) aggregate')])->groupBy('rss');

        if ($user !== null) {
            $resources->where('user_id', '=', $user->id);
        }

        $rss = $resources->get()->pluck('aggregate', 'rss')->all();

        return array_merge(['food' => 0, 'stones' => 0, 'timber' => 0, 'ore' => 0, 'gold' => 0], $rss);
    }

    /**
     * @param \Illuminate\Contracts\Auth\Authenticatable|User $user
     * @param array $columns
     * @return Resource[]
     * @throws \Exception
     */
    public function getWithPaginator(User $user, $columns = ['*'])
    {
        $resources = Resource::with(['user', 'creator'])->limit(5)->latest();

        if (!$user->hasAnyPermission(['all', 'accept income'])) {
            $resources->where('user_id', '=', $user->id);
        }

        return $resources->get();
    }
}
