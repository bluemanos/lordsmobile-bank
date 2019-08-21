<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResourceRequest;
use App\Model\Resource;
use App\Model\User;
use App\Repositories\BankRepository;
use App\Repositories\ResourceRepository;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
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
    public function index(BankRepository $banktRepository, ResourceRepository $resourceRepository)
    {
        $bankRss = $resourceRepository->sum();
        $yourRss = $resourceRepository->sum(auth()->user());

        $resources = Resource::with(['user', 'creator'])->limit(5)->latest()->get();
        $banks = $banktRepository->all();

        return view('home', compact('bankRss', 'yourRss', 'resources', 'banks'));
    }

    /**
     * @param StoreResourceRequest $request
     * @return mixed
     */
    public function store(StoreResourceRequest $request)
    {
        $user = auth()->user();

        if ($request->has('nick') && auth()->user()->hasAnyPermission(['all', 'accept income'])) {
            $user = User::firstOrCreate([
                'nick' => $request->get('nick'),
            ]);
        }

        Resource::create([
            'bank_id' => $request->get('bank'),
            'creator_id' => auth()->user()->id,
            'user_id' => $user->id,
            'accepted_by' => auth()->user()->hasAnyPermission(['all', 'accept income']) ? auth()->user() : null,
            'amount' => $request->get('amount'),
            'rss' => $request->get('rss'),
            'comment' => $request->get('comment', ''),
        ]);

        return back()->withSuccess('Resource added');
    }
}
