<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>
    <title>Login - {{ config('app.name') }}</title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="log">
        <div class="card mb-3 text-black bg-primary border-primary">
            <div class="card-body">
                <blockquote class="card-blockquote text-center">
                   <p><h1 class="text-white">Life Time Subscription</h1>
                    <span class="h2 text-warning">&nabla;</span>
                        <h4 class="text-white">Ksh 3000</h4><p>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="login-box">
        <form class="login-form" action="{{ route('seller.stk_trigger') }}" method="POST" role="form">
            @csrf
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Activate Your Shop</h3>

            <div class="form-group" >
                <label class="control-label" for="email">Phone</label>
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">254</span></div>
                    <input class="form-control @error('phone') is-invalid @enderror" type="tel" pattern="254[0-9]{9}"  id="phone" name="phone" placeholder="07XXX"  value="{{ old('phone') }}" required>
                    <span class="invalid-feedback">@error('phone') {{ $message }} @enderror</span>
                </div>


            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>Proceed To Payments</button>
            </div>
            <br>
            <br>
            <div class="card border-warning">
                <div class="row card-body">
                    <div class="col-md-8">
                        <p class="">
                            From the Palm of your hand
                        </p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{asset('frontend/images/logos/M-pesa-logo.png')}}">
                    </div>
                </div>
        </form>

    </div>
</section>
<section>

</section>
<script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('backend/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/js/main.js') }}"></script>
<script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
</body>
</html>
