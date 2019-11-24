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
    <div class="logo">
        <h1>Final Step</h1>
    </div>
    <div class="login-box">
      <div class="card border-info">
          <div class="card-body">
              <p>
              <h1><span class="fa fa-phone"></span></h1>
                  <h3>
                  We pushed payment request to your phone
              </h3>
              <h5>Enter your pin to confirm subscription then proceed to dashboard</h5>
              </p>
              <a href="{{route('seller.dashboard')}}" class="btn btn-info">Visit My Dashboard</a>
          </div>
      </div>

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
