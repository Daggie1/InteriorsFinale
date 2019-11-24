
@extends('seller.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
{{--    <div class="app-title">--}}
{{--        <div>--}}
{{--            <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }}</h1>--}}
{{--            <p>{{ $subTitle }}</p>--}}
{{--        </div>--}}
{{--        <a href="{{ route('seller.shop.create') }}" class="btn btn-primary pull-right">New Shop</a>--}}
{{--    </div>--}}
    <main class="app-conte">
        <div class="row user">
            <div class="col-md-12">
                <div class="profile">
                    <div class="info"><img class="user-img" src="{{asset('frontend/images/avatars/default_user.jpg')}}">
                        <h4>{{$shop->name}}</h4>
                        <p>{{\App\Models\Counties::find($shop->location)->name}}</p>
                    </div>
                    <div class="cover-image"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="tile p-0">
                    <ul class="nav flex-column nav-tabs user-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#products" data-toggle="tab"> <span class="fa fa-shopping-bag"></span> Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="#orders" data-toggle="tab"><span class="fa fa-bar-chart"></span>Orders</a></li>
                        <li class="nav-item"><a class="nav-link" href="#transactions" data-toggle="tab"><span class="fa fa-dollar"></span>Transactions</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="products">

{{--products--}}
                        <div class="tile">

                            <div class="tile-body">
<a href="{{route('seller.products.create')}}" class="btn btn-primary pull-right">Add Product</a>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> SKU </th>
                                <th> Name </th>
                                <th class="text-center"> Brand </th>
                                <th class="text-center"> Categories </th>
                                <th class="text-center"> Price </th>
                                <th class="text-center"> Status </th>
                                <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>
                                        @foreach($product->categories as $category)
                                            <span class="badge badge-info">{{ $category->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ config('settings.currency_symbol') }}{{ $product->price }}</td>
                                    <td class="text-center">
                                        @if ($product->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Not Active</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('seller.products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('seller.products.edit', $product->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            </div>
                        </div>
{{--                        // END of products--}}
                    </div>
                    <div class="tab-pane fade" id="orders">
{{--orders--}}
                        <div class="tile">

                            <div class="tile-body">
                                <div class="bs-component">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#complete"><span class="fa fa-check text-success"></span> &nbsp; Complete</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pending"><span class="fa fa-refresh text-warning"></span> &nbsp; Pending</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#failed"><span class="fa fa-close text-danger"></span> &nbsp; Failed</a></li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="complete">
{{--                                         complete oders--}}
                                            <div class="tile">
                                                <div class="tile-body">

                                                    <table class="table table-hover table-bordered" id="sampleTable">
                                                        <thead>
                                                        <tr>
                                                            <th> Order Number </th>
                                                            <th> Placed By </th>
                                                            <th class="text-center"> Total Amount </th>
                                                            <th class="text-center"> Items Qty </th>
                                                            <th class="text-center"> Payment Status </th>
                                                            <th class="text-center"> Status </th>
                                                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($orders as $order)
                                                            <tr>
                                                                <td>{{ $order->order_number }}</td>
                                                                <td>{{ $order->user->fullName }}</td>
                                                                <td class="text-center">{{ config('settings.currency_symbol') }}{{ $order->grand_total }}</td>
                                                                <td class="text-center">{{ $order->item_count }}</td>
                                                                <td class="text-center">
                                                                    @if ($order->payment_status == 1)
                                                                        <span class="badge badge-success">Completed</span>
                                                                    @else
                                                                        <span class="badge badge-danger">Not Completed</span>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    <span class="badge badge-success">{{ $order->status }}</span>
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                                        <a href="{{ route('seller.orders.show', $order->order_number) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
{{--                                            //END of complete orders--}}
                                        </div>
                                        <div class="tab-pane fade" id="pending">
                                            {{--                                         pending oders--}}
                                            <table class="table table-hover table-bordered" id="sampleTable">
                                                <thead>
                                                <tr>
                                                    <th> Order Number </th>
                                                    <th> Placed By </th>
                                                    <th class="text-center"> Total Amount </th>
                                                    <th class="text-center"> Items Qty </th>
                                                    <th class="text-center"> Payment Status </th>
                                                    <th class="text-center"> Status </th>
                                                    <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{ $order->order_number }}</td>
                                                        <td>{{ $order->user->fullName }}</td>
                                                        <td class="text-center">{{ config('settings.currency_symbol') }}{{ $order->grand_total }}</td>
                                                        <td class="text-center">{{ $order->item_count }}</td>
                                                        <td class="text-center">
                                                            @if ($order->payment_status == 1)
                                                                <span class="badge badge-success">Completed</span>
                                                            @else
                                                                <span class="badge badge-danger">Not Completed</span>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="badge badge-success">{{ $order->status }}</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group" role="group" aria-label="Second group">
                                                                <a href="{{ route('seller.orders.show', $order->order_number) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            {{--                                            //END of pending orders--}}
                                        </div>
                                        <div class="tab-pane fade" id="failed">
                                            {{--                                         failed oders--}}
                                            <table class="table table-hover table-bordered" id="sampleTable">
                                                <thead>
                                                <tr>
                                                    <th> Order Number </th>
                                                    <th> Placed By </th>
                                                    <th class="text-center"> Total Amount </th>
                                                    <th class="text-center"> Items Qty </th>
                                                    <th class="text-center"> Payment Status </th>
                                                    <th class="text-center"> Status </th>
                                                    <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{ $order->order_number }}</td>
                                                        <td>{{ $order->user->fullName }}</td>
                                                        <td class="text-center">{{ config('settings.currency_symbol') }}{{ $order->grand_total }}</td>
                                                        <td class="text-center">{{ $order->item_count }}</td>
                                                        <td class="text-center">
                                                            @if ($order->payment_status == 1)
                                                                <span class="badge badge-success">Completed</span>
                                                            @else
                                                                <span class="badge badge-danger">Not Completed</span>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="badge badge-success">{{ $order->status }}</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group" role="group" aria-label="Second group">
                                                                <a href="{{ route('seller.orders.show', $order->order_number) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            {{--                                            //END of failed orders--}}
                                        </div>

                                    </div>
                                </div>


                    </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="transactions">
                        {{--transactions--}}
                        <div class="tile">
                            <div class="tile-title"> All Transactions Goes here</div>
                                <div class="tile-body">

                                </div>


                </div>
            </div>
        </div>
            </div>
        </div>
    </main>


@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
