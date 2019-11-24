<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/remove_caret_from_number_input.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>


    <title>New Account - {{ config('app.name') }}</title>
</head>
<body >
<br>
<br>
<br>

<main  id="app">
<div class="">
   <div class="row ">
       <div class="offset-md-4"></div>
       <div class="col-md-5 card mb-3 border-success">

            <form  class="login-form" action="{{route('seller.register.post')}}" method="post" enctype="multipart/form-data">
                @csrf

                        <section class="text-center"><img class="app-sidebar__user-avatar" width="100" src="{{asset('frontend/images/avatars/default_user.jpg')}}" alt="User Image">
                        </section>
                        <br>
                        <h3 class="login-head text-center "> Lets Begin Here</h3>
                        <br>
                        <br>
                <div class="row">
                    <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="email">First Name</label>
                    <input class="form-control @error('f_name') is-invalid @enderror" type="text" id="f_name" name="f_name" placeholder="First name" autofocus value="{{ old('f_name') }}" required>
                   <span class="invalid-feedback">@error('f_name') {{ $message }} @enderror</span>
                </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="email">Last Name</label>
                            <input class="form-control @error('l_name') is-invalid @enderror" type="text" id="name" name="l_name" placeholder="Last name"  value="{{ old('l_name') }}" required>
                            <span class="invalid-feedback">@error('l_name') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Phone</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">254</span></div>
                                <input class="form-control @error('phone') is-invalid @enderror" type="tel" pattern="0[0-9]{9}"  id="phone" name="phone" placeholder="07XXX"  value="{{ old('phone') }}" required>
                                <span class="invalid-feedback">@error('phone') {{ $message }} @enderror</span>
                            </div>
                        </div>





                                <div class="form-group">
                                    <label class="control-label" for="email">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="Email address"  value="{{ old('email') }}" required>
                                    <span class="invalid-feedback">@error('email') {{ $message }} @enderror</span>
                                </div>

                <div class="form-group">
                    <label class="control-label" for="email">ID No</label>
                    <input class="form-control @error('id_no') is-invalid @enderror" type="number" id="id_no" name="id_no" placeholder="Identification Number"  value="{{ old('id_no') }}" required>
                    <span class="invalid-feedback">@error('id_no') {{ $message }} @enderror</span>
                </div>

                        <div class="row"><div class="col-md-6">
                <div class="form-group">

                    <label class="control-label" for="email">Password</label>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Password"  required>
                </div>
                            </div>

                    <div class="col-md-6">
                        <div class="form-group">

                            <label class="control-label" for="email">Confirm Password</label>
                            <input class="form-control" type="password" id="password" name="password" placeholder="Password"  required>
                        </div>
                    </div>
                    </div>


                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox">By Registering you abide to some of our  <a href=""><strong>E-shop &nbsp;</strong>terms and conditions</a>
                            </label>
                        </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>Save Details</button>
                </div>
                <p class="text-center">
              Aready hava an account?<span class="text-info"> <a href="{{route('seller.login')}}">Login here</a> </span>
                </p>

            </form>
       </div>
    <div class="offset-md-3"></div>
   </div>

<script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('backend/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/js/main.js') }}"></script>
<script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>

    <section>
    </section>
</div>
</main>
</body>
</html>
