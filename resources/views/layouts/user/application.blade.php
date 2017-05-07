<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', config('site.name', ''))</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">

    @include('layouts.user.metadata')
    @include('layouts.user.styles')
    @section('styles')
        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: "Karma", sans-serif
            }

            .w3-bar-block .w3-bar-item {
                padding: 20px
            }
        </style>
    @show
    <meta name="csrf-token" content="{!! csrf_token() !!}">
</head>
<body class="{!! isset($bodyClasses) ? $bodyClasses : '' !!}">
@if( isset($noFrame) && $noFrame == true )
    @yield('content')
@else
    @include('layouts.user.frame')
@endif
@include('layouts.user.scripts')
@section('scripts')
@show
<!-- Top menu -->
<div class="w3-top">
    <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
        <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
        <div class="w3-right w3-padding-16">Mail</div>
        <div class="w3-center w3-padding-16">My Blog</div>
    </div>
</div>

</body>
</html>
