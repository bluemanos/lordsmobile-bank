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
     * @param BankRepository $bankRepository
     * @param ResourceRepository $resourceRepository
     * @return \Illuminate\Contracts\Support\Renderable
     * @throws \Exception
     */
    public function index(BankRepository $bankRepository, ResourceRepository $resourceRepository)
    {
        $bankRss = $resourceRepository->sum();
        $yourRss = $resourceRepository->sum(auth()->user());
        $resources = $resourceRepository->getWithPaginator(auth()->user());
        $banks = $bankRepository->all();

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
                'nick' => $request->get('nick'),HabPanel

            ]);
        }

        Resource::create([
            'bank_id' => $request->get('bank'),
            'creator_id' => auth()->user()->id,
            'user_id' => $user->id,
            'accepted_by' => auth()->user()->hasAnyPermission(['all', 'accept income']) ? auth()->user()->id : null,
            'amount' => $request->get('amount'),
            'rss' => $request->get('rss'),
            'comment' => $request->get('comment', ''),
        ]);

        return back()->withSuccess('Resource added');
    }
}
