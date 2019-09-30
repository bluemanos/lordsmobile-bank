@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ shortGuildName() }} {{ longGuildName() }}</h1>
</div>

<div class="row">

    <div class="col-xl-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Last supplies</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                @if ($resources->total() === 0)
                    <div class="alert alert-success" role="alert">
                        <b>Good job!</b> Nothing to accept.
                    </div>
                @else
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
                                @if ($resource->accepted_by !== null)
                                    <span class="fa fa-check text-success"></span>
                                @else
                                    <span class="fa fa-times text-danger"></span>
                                @endif
                                {{ rss_format($resource->amount) }}
                                @if (!empty($resource->comment))
                                    <span class="fa fa-comment" data-toggle="tooltip" data-placement="top" title="{{ $resource->comment }}"></span>
                                @endif

                                @if ($resource->accepted_by === null && auth()->user()->hasAnyPermission(['all', 'accept income']))
                                {!! Form::open(['route' => 'deposit.to-accept', 'method' => 'put']) !!}
                                {!! Form::token() !!}
                                <button type="submit" name="rss" value="{{ $resource->id }}" class="btn btn-sm btn-success">Accept it</button>
                                {!! Form::close() !!}
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
                @endif
            </div>
        </div>
    </div>

</div>
@endsection

@section('javascript')
@endsection
