@extends('admin.layouts.app')

@section('content')
    <div class="row  border-bottom white-bg dashboard-header">
        <div class="col-md-6">
            <h2>Welcome {{Auth::user()->name}}</h2>
        </div>
    </div>
@endsection
