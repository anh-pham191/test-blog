@extends('layouts.admin.application', ['menu' => 'blogs'] )

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
<script src="{!! \URLHelper::asset('js/delete_item.js', 'admin') !!}"></script>
@stop

@section('title')
@stop

@section('header')
Blogs
@stop

@section('breadcrumb')
<li class="active">Blogs</li>
@stop

@section('content')
<div class="box box-primary" ng-app='Blog' ng-controller='BlogController' ng-init="show()">
    <div class="box-header with-border">
        <h3 class="box-title">
            <p class="text-right">
                <a href="{!! action('Admin\BlogController@create') !!}" class="btn btn-block btn-primary btn-sm">@lang('admin.pages.common.buttons.create')</a>
            </p>
        </h3>
        {!! \PaginationHelper::render($offset, $limit, $count, $baseUrl, []) !!}
    </div>
    <div class="box-body">
        <table class="table table-bordered" >
            <tr>
                <th style="width: 10px">ID</th>
                <th>@lang('admin.pages.blogs.columns.title')</th>
                <th>@lang('admin.pages.blogs.columns.main_image')</th>
            </tr>
{{--            @foreach( $models as $model )--}}
                <tr ng-repeat="blog in blogs">
                    <td><% blog.id %></td>
                <td><% blog.title %></td>
                <td><% blog.main_image %></td>
                    <td>
                        {{--<a href="{!! action('Admin\BlogController@show', $model->id) !!}" class="btn btn-block btn-primary btn-sm">@lang('admin.pages.common.buttons.edit')</a>--}}
                        {{--<a href="#" class="btn btn-block btn-danger btn-sm delete-button" data-delete-url="{!! action('Admin\BlogController@destroy', $model->id) !!}">@lang('admin.pages.common.buttons.delete')</a>--}}
                    </td>
                </tr>
            {{--@endforeach--}}
        </table>
    </div>
    <div class="box-footer">
        {!! \PaginationHelper::render($offset, $limit, $count, $baseUrl, []) !!}
    </div>
</div>
@stop
