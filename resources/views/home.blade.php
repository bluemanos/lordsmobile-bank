@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ shortGuildName() }} {{ longGuildName() }}</h1>
</div>

@if (auth()->user()->hasAnyPermission(['all', 'display bank']))
<h3>Bank</h3>
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-4 mb-3">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Food</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ rss_format($bankRss['food']) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-seedling fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-4 mb-3">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Stones</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ rss_format($bankRss['stones']) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cubes fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-4 mb-3">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Timber</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ rss_format($bankRss['timber']) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tree fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-2 col-md-4 mb-3">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ore</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ rss_format($bankRss['ore']) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-atom fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Gold</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ rss_format($bankRss['gold']) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-coins fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<h3>Your deposit</h3>
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-4 mb-3">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Food</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ rss_format($yourRss['food']) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-seedling fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-4 mb-3">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Stones</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ rss_format($yourRss['stones']) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cubes fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-4 mb-3">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Timber</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ rss_format($yourRss['timber']) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tree fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-2 col-md-4 mb-3">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ore</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ rss_format($yourRss['ore']) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-atom fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Gold</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ rss_format($yourRss['gold']) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-coins fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">New supply</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                {!! Form::open() !!}
                @if (auth()->user()->hasAnyPermission(['all', 'accept income']))
                <div class="form-group">
                    <label>Supplier nick</label>
                    {!! Form::text('nick', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                </div>
                @endif

                <div class="form-group">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-success">
                            {!! Form::radio('rss', 'food') !!} Food
                        </label>
                        <label class="btn btn-outline-secondary">
                            {!! Form::radio('rss', 'stones') !!} Stones
                        </label>
                        <label class="btn btn-outline-danger">
                            {!! Form::radio('rss', 'timber') !!} Timber
                        </label>
                        <label class="btn btn-outline-info">
                            {!! Form::radio('rss', 'ore') !!} &nbsp; Ore &nbsp;
                        </label>
                        <label class="btn btn-outline-warning">
                            {!! Form::radio('rss', 'gold') !!} Gold
                        </label>
                    </div>
                </div>

                <div class="form-group {{ $banks->count() === 1 ? 'd-none' : '' }}">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        @foreach ($banks as $bank)
                        <label class="btn btn-outline-success {{ $loop->first ? 'active' : '' }}">
                            {!! Form::radio('bank', $bank->id, $loop->first) !!} {{ $bank->name }}
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label>Amount</label>
                    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label>Comment</label>
                    {!! Form::text('comment', null, ['class' => 'form-control']) !!}
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Submit
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Last supplies</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
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
                            <td>
                                <a href="{{ route('user.profile', ['user' => $resource->user]) }}">{{ $resource->user->fullName }}</a>
                            </td>
                            <td>{{ $resource->rss }}</td>
                            <td>
                                @if ($resource->accepted_by !== null)
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
                </div>
                @if (auth()->user()->hasAnyPermission(['all', 'display bank']))
                <a href="{{ route('deposit.index') }}" class="btn btn-primary"><i class="fa fa-list"></i>  Show more</a>
                @endif
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Your resources overview</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Food
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-secondary"></i> Stones
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Timber
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Ore
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> Gold
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script>
        const food_amount = {{ $yourRss['food'] }};
        const stones_amount = {{ $yourRss['stones'] }};
        const timber_amount = {{ $yourRss['timber'] }};
        const ore_amount = {{ $yourRss['ore'] }};
        const gold_amount = {{ $yourRss['gold'] }};

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
@endsection
