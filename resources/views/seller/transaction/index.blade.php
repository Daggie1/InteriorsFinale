@extends('seller.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }} - {{ $subTitle }}</h1>
        </div>
    </div>
    @include('seller.partials.flash')

    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#allTrans" data-toggle="tab">All Transactions</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cashIn" data-toggle="tab">Cash in</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cashOut" data-toggle="tab">Cash out</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="allTrans">
                    <div class="tile">
                        <div class="tile-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Ref Id </th>
                                    <th> Method  </th>
                                    <th class="text-center"> Amount</th>
                                    <th class="text-center"> Date </th>
                                    <th class="text-center"> Balance </th>
                                    <th class="text-center"> Comment </th>
                                    <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane " id="cashIn">
                    <div class="tile">
                        <div class="tile-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Ref Id </th>
                                    <th> Method  </th>
                                    <th class="text-center"> Amount</th>
                                    <th class="text-center"> Date </th>
                                    <th class="text-center"> Balance </th>
                                    <th class="text-center"> Comment </th>
                                    <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="cashOut">
                    <div class="tile">
                        <div class="tile-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Ref Id </th>
                                    <th> Method  </th>
                                    <th class="text-center"> Amount</th>
                                    <th class="text-center"> Date </th>
                                    <th class="text-center"> Balance </th>
                                    <th class="text-center"> Comment </th>
                                    <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            @stop
