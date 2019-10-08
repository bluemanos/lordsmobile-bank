<?php

namespace App\Http\Controllers;

use App\Model\Resource;
use Illuminate\Http\Request;

/**
 * Class DepositController
 * @package App\Http\Controllers
 */
class DepositController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role_or_permission:all|display bank']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $resources = Resource::with(['user', 'creator'])->latest()->paginate();

        return view('deposit', compact('resources'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function toAccept()
    {
        $resources = Resource::whereNull('accepted_by')->with(['user', 'creator'])->latest()->paginate();

        return view('deposit', compact('resources'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function toAcceptProcess(Request $request)
    {
        $resource = Resource::findOrFail($request->get('rss'));
        $resource->accepted_by = auth()->user()->id;
        $resource->save();

        return back();
    }
}
