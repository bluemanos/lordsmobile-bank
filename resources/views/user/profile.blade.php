@extends('layouts.app')

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
                @foreach ($userRss as $rss => $amount)
                    {{ ucfirst($rss) }}: {{ rss_format($amount) }}<br>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection

@section('javascript')
@endsection
