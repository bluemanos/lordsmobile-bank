<?php

namespace App\Http\Controllers;

use App\Model\Resource;
use App\Model\User;
use App\Repositories\ResourceRepository;
use Spatie\Permission\Exceptions\UnauthorizedException;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile(User $user, ResourceRepository $resourceRepository)
    {
        $permissions = ['all', 'accept income'];
        if ($user->id !== auth()->user()->id && !auth()->user()->hasAnyPermission($permissions)) {
            throw UnauthorizedException::forRolesOrPermissions($permissions);
        }

        $resources = Resource::where('user_id', '=', $user->id)->with(['user', 'creator'])->latest()->paginate();
        $userRss = $resourceRepository->sum($user);

        return view('user.profile', [
            'user' => $user,
            'resources' => $resources,
            'userRss' => $userRss,
            'userRssSum' => array_sum($userRss),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        $users = User::paginate();

        return view('user.list', compact('users'));
    }
}
