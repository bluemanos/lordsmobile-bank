@extends('layouts.app')

@section('stylesheet')
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
                <h6 class="m-0 font-weight-bold text-primary">Your account</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                {!! Form::model($user) !!}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Your name</label>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        <small id="emailHelp" class="form-text text-muted">Your name in a game - the first part of your nickname.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Your nick</label>
                        {!! Form::text('nick', null, ['class' => 'form-control']) !!}
                        <small id="emailHelp" class="form-text text-muted">Your nick in a game - the second part of your nickname.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>
@endsection

@section('javascript')
@endsection
