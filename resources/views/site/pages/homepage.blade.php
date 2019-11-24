@extends('site.app')
@section('title', 'Homepage')
@section('content')
    <div class="container">
        <!-- ========================= SECTION MAIN ========================= -->
        <section class="section-main bg padding-top-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <!-- ================= main slide ================= -->
                        <div class="owl-init slider-main owl-carousel" data-items="1" data-dots="false" data-nav="true">
                            <div class="item-slide">
                                <img src="{{asset('frontend/images/banners/slide1.jpg')}}">
                            </div>
                            <div class="item-slide rounded">
                                <img src="{{asset('frontend/images/banners/slide2.jpg')}}">
                            </div>
                            <div class="item-slide rounded">
                                <img src="{{asset('frontend/images/banners/slide3.jpg')}}">
                            </div>
                        </div>
                        <!-- ============== main slidesow .end // ============= -->
                    </div>

                @foreach( $featured_categories as $category)
                    <!-- col.// -->
                    <div class="col-md-3">
                        <div class="card mt-2 mb-2">
                            <figure class="itemside">
                                <div class="aside">
                                    <div class="img-wrap img-sm border-right"><img src="{{asset('storage/'.$category->image)}}"></div>
                                </div>
                                <figcaption class="p-3">
                                    <h6 class="title"><a href="{{ route('category.show', $category->slug) }}">{{$category->name}}</a></h6>

                                    <!-- price-wrap.// -->
                                </figcaption>
                            </figure>
                        </div>
                        @endforeach

                    </div>
                    <!-- col.// -->
                </div>
            </div>
            <!-- container .//  -->
        </section>
        <!-- ========================= SECTION MAIN END// ========================= -->

        <!-- ========================= Blog ========================= -->
        <section class="section-content padding-y-sm bg">
            <div class="container">
                <header class="section-heading heading-line">
                    <h4 class="title-section bg">Featured Categories</h4>
                </header>
                <div class="row">
                    @foreach( $featured_categories as $category)
                    <div class="col-md-4">
                        <div class="card-banner" style="height:250px; background-image: url({{asset('storage/'.$category->image)}});">
                            <article class="overlay overlay-cover d-flex align-items-center justify-content-center">
                                <div class="text-center">
                                    <h5 class="card-title">{{$category->name}}</h5>
                                    <a href="{{ route('category.show', $category->slug) }}" class="btn btn-warning btn-sm"> View All </a>
                                </div>
                            </article>
                        </div>
                        <!-- card.// -->
                    </div>
@endforeach
                </div>
            </div>
        </section>
        <!-- ========================= Blog .END// ========================= -->

        <section class="section-content padding-y-sm bg">
            <div class="container">

                <header class="section-heading heading-line">
                    <h4 class="title-section bg">FEATURED PRODUCTS</h4>
                </header>
                <div class="row">
                    <div class="offset-md-11"></div>
                    <div class="col-md-1">
                <a href="" class="btn btn-sm btn-warning pull-right text-white ">View All</a>
                    </div>

                </div>
                <br>
                <div class="row">
                    @foreach($featured_products as $product)
                        <div class="col-md-3">
                            <figure class="card card-product">
                                @if ($product->images->count() > 0)
                                    <div class="img-wrap "><img src="{{ asset('storage/'.$product->images->first()->full) }}" alt="{{ $product->name }} image"></div>
                                @else
                                    <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
                                @endif
                                <figcaption class="info-wrap">
                                    <h4 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
{{--                                    <p class="desc">{{substr($product->description,0,45)}}&nbsp; ...</p>--}}
                                    @if($product->reviews->count()>0)
{{--                                    <div class="rating-wrap">--}}
{{--                                        <ul class="rating-stars">--}}
{{--                                            <li style="width:{{$product->average_rating*20}}%" class="stars-active">--}}
{{--                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                        <div class="label-rating">{{$product->reviews->count()}} &nbsp; reviews</div>--}}
{{--                                        <div class="label-rating">154 orders </div>--}}
{{--                                    </div>--}}
                                        @endif
                                </figcaption>
                                <div class="bottom-wrap">
                                    <a href="{{ route('product.show', $product->slug) }}" class="btn btn-sm btn-success float-right">View Details</a>
                                    @if ($product->sale_price != 0)
                                        <div class="price-wrap h5">
                                            <span class="price"> {{ config('settings.currency_symbol').$product->sale_price }} </span>
                                            <del class="price-old"> {{ config('settings.currency_symbol').$product->price }}</del>
                                        </div>
                                    @else
                                        <div class="price-wrap h5">
                                            <span class="price"> {{ config('settings.currency_symbol').$product->price }} </span>
                                        </div>
                                    @endif
                                </div>
                            </figure>
                        </div>
@endforeach
                    <!-- col // -->
                </div>
                <!-- row.// -->

            </div>
            <!-- container .//  -->
        </section>
        <!-- ========================= SECTION ITEMS ========================= -->
        <section class="section-request bg padding-y-sm">
            <div class="container">
                <header class="section-heading heading-line">
                    <h4 class="title-section bg text-uppercase">Recently Added</h4>
                </header>
                <div class="row">
                    @foreach($recently_added as $product)
                        <div class="col-md-3">
                            <figure class="card card-product">
                                @if ($product->images->count() > 0)
                                    <div class="img-wrap "><img src="{{ asset('storage/'.$product->images->first()->full) }}" alt="{{ $product->name }} image"></div>
                                @else
                                    <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
                                @endif
                                <figcaption class="info-wrap">
                                    <h4 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                                    {{--                                    <p class="desc">{{substr($product->description,0,45)}}&nbsp; ...</p>--}}
                                    @if($product->reviews->count()>0)
                                        {{--                                    <div class="rating-wrap">--}}
                                        {{--                                        <ul class="rating-stars">--}}
                                        {{--                                            <li style="width:{{$product->average_rating*20}}%" class="stars-active">--}}
                                        {{--                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>--}}
                                        {{--                                            </li>--}}
                                        {{--                                            <li>--}}
                                        {{--                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>--}}
                                        {{--                                            </li>--}}
                                        {{--                                        </ul>--}}
                                        {{--                                        <div class="label-rating">{{$product->reviews->count()}} &nbsp; reviews</div>--}}
                                        {{--                                        <div class="label-rating">154 orders </div>--}}
                                        {{--                                    </div>--}}
                                    @endif
                                </figcaption>
                                <div class="bottom-wrap">
                                    <a href="{{ route('product.show', $product->slug) }}" class="btn btn-sm btn-success float-right">View Details</a>
                                    @if ($product->sale_price != 0)
                                        <div class="price-wrap h5">
                                            <span class="price"> {{ config('settings.currency_symbol').$product->sale_price }} </span>
                                            <del class="price-old"> {{ config('settings.currency_symbol').$product->price }}</del>
                                        </div>
                                    @else
                                        <div class="price-wrap h5">
                                            <span class="price"> {{ config('settings.currency_symbol').$product->price }} </span>
                                        </div>
                                    @endif
                                </div>
                            </figure>
                        </div>
                @endforeach
                    <!-- col // -->
                </div>
                <!-- row.// -->

            </div>
            <!-- container // -->
        </section>
    </div>
@stop
