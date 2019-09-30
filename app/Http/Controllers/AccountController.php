<?php

namespace App\Http\Controllers;

use App\Model\Resource;
use App\Model\User;
use App\Repositories\ResourceRepository;
use Illuminate\Http\Request;

/**
 * Class AccountController
 * @package App\Http\Controllers
 */
class AccountController extends Controller
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account()
    {
        return view('user.account', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accountSave(Request $request)
    {
        $user = auth()->user();
        $user->fill($request->only(['nick', 'name']));
        $user->save();

        return back()->with('success', 'Saved');
    }
}
