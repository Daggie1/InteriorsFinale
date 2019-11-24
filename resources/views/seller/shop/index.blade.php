
@extends('seller.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('seller.shop.create') }}" class="btn btn-primary pull-right">New Shop</a>
    </div>
        <div class="row">
            @foreach($shops as $shopy)
            <div class="col-lg-4">
                <div class="bs-component">
                    <div class="card mb-3 text-white bg-success">

                        <div class="card-body">
                            <div class="card-title">
                                <h3><span class="fa fa-home text-danger"></span>&nbsp;{{ $shopy->name }}   <div class="pull-right h6">
                                        <p><b>Status</b></p>
                                        <div class="toggle-flip">
                                            <label>
                                                <input type="checkbox" checked><span class="flip-indecator " data-toggle-on="Active"
                                                                             data-toggle-off="Suspended"></span>
                                            </label>
                                        </div>
                                    </div></h3>

                                <span class="fa fa-location-arrow"></span>  &nbsp;{{\App\Models\Counties::find($shopy->location)->name}}
                            </div>

                            <blockquote class="card-blockquote">
                                <p>{{$shopy->description}}</p>

                            </blockquote>
                            <a href="{{route('seller.shop.edit',$shopy->id)}}" class="btn btn-warning pull-right"><span class="text-white">Manage &nbsp;</span> <span class="fa fa-chevron-right text-white"></span> </a>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
        </div>

@endsection
@push('scripts')
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
