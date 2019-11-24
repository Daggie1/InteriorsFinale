@extends('seller.app')
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
                <i class="icon fa fa-shopping-bag fa-3x"></i>
                <div class="info">
                    <h4>Products</h4>
                    <p><b>{{$products->count()}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-dollar fa-3x"></i>
                <div class="info">
                    <h4>Transaction</h4>
                    <p><b>{{$transactions}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-bar-chart fa-3x"></i>
                <div class="info">
                    <h4>Orders</h4>
                    <p><b>{{$orders}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-bar-chart fa-3x"></i>
                <div class="info">
                    <h4>Stars</h4>
                    <p><b>{{$orders}}</b></p>
                </div>
            </div>
        </div>
    </div>

       <a href="{{route('seller.shop')}}" class="btn btn-facebook"></a>

@endsection
