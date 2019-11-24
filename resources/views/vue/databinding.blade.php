<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link type="text/css" href="{{asset('frontend/css/bootstrap.css')}}}">
</head>
<body >
<div  id="app">
    <h3>Vue Js</h3>

        <example-component>

        </example-component>
</div>

<script type="text/javascript" src="{{ asset('backend/js/app.js') }}"></script>
</body>
</html>
