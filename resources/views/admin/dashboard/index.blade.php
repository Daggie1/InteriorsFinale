@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Users</h4>
                    <p><b>{{$users->count()}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-user-circle fa-3x"></i>
                <div class="info">
                    <h4>Sellers</h4>
                    <p><b>{{$sellers->count()}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-home fa-3x"></i>
                <div class="info">
                    <h4>Shops</h4>
                    <p><b>{{$shops->count()}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-bar-chart fa-3x"></i>
                <div class="info">
                    <h4>Orders</h4>
                    <p><b>{{$orders->count()}}</b></p>
                </div>
            </div>
        </div>
    </div>
@endsection
