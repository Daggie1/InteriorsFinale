<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>
</head>
<body class="bg-primary">
<main class="app-content bg-primary">

        <p>
            <main class="align-self-center">
                <div class="row">
                    <div class="offset-md-2"></div>
                    <div class="col-md-6">
                        <div class="tile card mb-3 border-warning" >
                            <section class="text-center"><img class="app-sidebar__user-avatar" width="100" src="{{asset('frontend/images/avatars/default_user.jpg')}}" alt="User Image">

                            </section>
                            <br>
                            <h3 class="tile-title text-center">Hello {{auth()->user()->name}},   Set Up your Shop here</h3>
                            <div class="tile-body">

                                <form  action="{{route('seller.shop.create.post')}}" method="post" enctype="multipart/form-data">
@csrf
                                    <div class="form-group">
                                        <label class="control-label" for="email">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="Shop name    " autofocus value="{{ old('name') }}" required>
                                        <span class="invalid-feedback">@error('name') {{ $message }} @enderror</span>
                                    </div>
                                            <div class="form-group">
                                                <label class="control-label" for="email">Location</label>
                                                <select class="form-control"  name="location"  value="{{ old('location') }}" required>
                                                    @foreach($counties as $county)
                                                        <option value="{{ $county->id }}">{{ $county->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    <div class="form-group">
                                        <label class="control-label" for="email">Phone</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">254</span></div>
                                            <input class="form-control @error('phone') is-invalid @enderror" type="tel" pattern="254[0-9]{9}"  id="phone" name="phone" placeholder="07XXX"  value="{{ old('phone') }}" required>
                                            <span class="invalid-feedback">@error('phone') {{ $message }} @enderror</span>
                                        </div>
                                    </div>

                                            <div class="row">
                                                <div class="col-3">

                                                    <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="logoImg" style="width: 80px; height: auto;">

                                                </div>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <label class="control-label">Logo</label>
                                                        <input class="form-control" type="file" name="image" onchange="loadFile(event,'logoImg')"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="description">Description </label>
                                                <textarea class="form-control" rows="4" cols="5" name="description" placeholder="A little bit about your shop" required>

                </textarea>

                                            </div>
                                    <div class="form-group btn-container">
                                        <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-plus-square"></i>Save Details</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="offset-md-3"></div>

                </div>
            </main>
</main>

<script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('backend/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/js/main.js') }}"></script>
<script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
<script>
    loadFile = function(event, id) {
        var output = document.getElementById(id);
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
</body>
</html>

