@extends('layouts.admin.application', ['menu' => 'blogs'] )

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
<script src="{{ \URLHelper::asset('libs/moment/moment.min.js', 'admin') }}"></script>
<script src="{{ \URLHelper::asset('libs/datetimepicker/js/bootstrap-datetimepicker.min.js', 'admin') }}"></script>
<script>
$('.datetime-field').datetimepicker({'format': 'YYYY-MM-DD HH:mm:ss'});
</script>
@stop

@section('title')
@stop

@section('header')
Blogs
@stop

@section('breadcrumb')
    <li><a href="{!! action('Admin\BlogController@index') !!}"><i class="fa fa-files-o"></i> Blogs</a></li>
    @if( $isNew )
        <li class="active">New</li>
    @else
        <li class="active">{{ $blog->id }}</li>
    @endif
@stop

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if( $isNew )
        <form action="{!! action('Admin\BlogController@store') !!}" method="POST" enctype="multipart/form-data">
    @else
        <form action="{!! action('Admin\BlogController@update', [$blog->id]) !!}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
    @endif
            {!! csrf_field() !!}
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">

                    </h3>
                </div>
                <div class="box-body">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @if ($errors->has('title')) has-error @endif">
                                <label for="title">@lang('admin.pages.blogs.columns.title')</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ? old('title') : $blog->title }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @if ($errors->has('main_image')) has-error @endif">
                                <label for="main_image">@lang('admin.pages.blogs.columns.main_image')</label>
                                <input type="text" class="form-control" id="main_image" name="main_image" value="{{ old('main_image') ? old('main_image') : $blog->main_image }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @if ($errors->has('body')) has-error @endif">
                                <label for="body">@lang('admin.pages.blogs.columns.body')</label>
                                <textarea name="body" class="form-control" rows="5" placeholder="@lang('admin.pages.blogs.columns.body')">{{ old('body') ? old('body') : $blog->body }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @if ($errors->has('summary')) has-error @endif">
                                <label for="summary">@lang('admin.pages.blogs.columns.summary')</label>
                                <textarea name="summary" class="form-control" rows="5" placeholder="@lang('admin.pages.blogs.columns.summary')">{{ old('summary') ? old('summary') : $blog->summary }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">@lang('admin.pages.common.buttons.save')</button>
                </div>
            </div>
        </form>
@stop
