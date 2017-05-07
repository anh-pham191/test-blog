@extends('layouts.user.application')

@section('metadata')
@stop

@section('styles')
@parent
<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
<style>
    html, body {
        height: 100%;
    }

    body {
        margin: 0;
        padding: 0;
        width: 100%;
        display: table;
        font-weight: 100;
        font-family: 'Lato';
    }

    .container {
        text-align: center;
        display: table-cell;
        vertical-align: middle;
    }

    .content {
        text-align: center;
        display: inline-block;
    }

    .title {
        font-size: 96px;
    }
</style>
@stop

@section('title')
@stop

@section('scripts')
@parent
@stop

@section('content')


        <!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

    <!-- First Photo Grid-->
    <div class="w3-row-padding w3-padding-16 w3-center" id="food">
        @foreach($blogs as $blog)
            <div class="w3-quarter">
                <h3>{!! $blog->title !!}</h3>
                <p>{!! $blog->body !!}</p>
            </div>
        @endforeach
    </div>
</div>
@stop
