@extends('layouts.app')

@section('stylesheet')
    <style>
        .bd-example>.alert+.alert, .bd-example>.nav+.nav, .bd-example>.navbar+.navbar, .bd-example>.progress+.btn, .bd-example>.progress+.progress {
            margin-top: 1rem;
        }
    </style>
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">[PRL] PolishSquad Lords Mobile</h1>
</div>

<div class="row">

    <div class="col-xl-8">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Last supplies by {{ $user->fullName }}</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    {{ $resources->links() }}

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Nick</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($resources as $resource)
                        <tr>
                            <td>{{ $resource->user->nick }}</td>
                            <td>{{ $resource->rss }}</td>
                            <td>
                                @if ($resource->accepted)
                                    <span class="fa fa-check text-success"></span>
                                @else
                                    <span class="fa fa-times text-danger"></span>
                                @endif
                                {{ rss_format($resource->amount) }}
                                @if (!empty($resource->comment))
                                    <span class="fa fa-comment" data-toggle="tooltip" data-placement="top" title="{{ $resource->comment }}"></span>
                                @endif
                            </td>
                            <td>
                                <span data-toggle="tooltip" data-placement="top" title="Added by `{{ $resource->creator->fullName }}`">
                                    {{ $resource->created_at }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $resources->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Sum</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="bd-example">
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width:{{ intval($userRss['food']/$userRssSum*100) }}%" aria-valuenow="{{ intval($userRss['food']/$userRssSum*100) }}" aria-valuemin="0" aria-valuemax="100">{{ rss_format($userRss['food']) }} food</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width:{{ intval($userRss['stones']/$userRssSum*100) }}%" aria-valuenow="{{ intval($userRss['stones']/$userRssSum*100) }}" aria-valuemin="0" aria-valuemax="100">{{ rss_format($userRss['stones']) }} stones</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width:{{ intval($userRss['timber']/$userRssSum*100) }}%" aria-valuenow="{{ intval($userRss['timber']/$userRssSum*100) }}" aria-valuemin="0" aria-valuemax="100">{{ rss_format($userRss['timber']) }} timber</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width:{{ intval($userRss['ore']/$userRssSum*100) }}%" aria-valuenow="{{ intval($userRss['ore']/$userRssSum*100) }}" aria-valuemin="0" aria-valuemax="100">{{ rss_format($userRss['ore']) }} ore</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width:{{ intval($userRss['gold']/$userRssSum*100) }}%" aria-valuenow="{{ intval($userRss['gold']/$userRssSum*100) }}" aria-valuemin="0" aria-valuemax="100">{{ rss_format($userRss['gold']) }} gold</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('javascript')
@endsection
