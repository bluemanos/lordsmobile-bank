<?php

namespace App\Http\Controllers;

use App\Model\Resource;
use App\Model\User;
use App\Repositories\ResourceRepository;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile(User $user, ResourceRepository $resourceRepository)
    {
        $resources = Resource::where('user_id', '=', $user->id)->with(['user', 'creator'])->latest()->paginate();
        $userRss = $resourceRepository->sum($user);

        return view('user.profile', compact('user', 'resources', 'userRss'));
    }

    public function list()
    {
        $users = User::paginate();

        return view('user.list', compact('users'));
    }
}
