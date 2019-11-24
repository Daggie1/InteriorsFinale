@extends('site.app')
@section('title', 'Payment Status')
@section('styles')
    <script src="https://use.fontawesome.com/38eb0b44ea.js"></script>
    @endsection
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Payment Status</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top">
        <div class="container">
            <div class="row">
                <main class="col-sm-12 text-center justify-content-center">

                  <h2><span class="fa fa-mobile-alt"></span></h2>
                    <div class="card bg-info">
                        <div class="card-body">
                            <h4>We pushed payment request to your Phone</h4>
                            <h5>Enter your pin to complete the payment</h5>
                        </div>
                    </div>

                </main>
            </div>
        </div>
    </section>
@stop
