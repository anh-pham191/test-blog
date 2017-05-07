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
                    <button data-toggle="modal" data-target="#create"
                       class="btn btn-block btn-primary btn-sm">@lang('admin.pages.common.buttons.create')</button>
                </p>
            </h3>
            {!! \PaginationHelper::render($offset, $limit, $count, $baseUrl, []) !!}
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 10px">ID</th>
                    <th>@lang('admin.pages.blogs.columns.title')</th>
                </tr>
                <tr ng-repeat="blog in blogs">
                    <td><% blog.id %></td>
                    <td><% blog.title %></td>
                    <td>
                        <button class="btn btn-block btn-primary btn-sm">@lang('admin.pages.common.buttons.edit')</button>
                        {{--<a href="#" class="btn btn-block btn-danger btn-sm delete-button" data-delete-url="{!! action('Admin\BlogController@destroy', $model->id) !!}">@lang('admin.pages.common.buttons.delete')</a>--}}
                    </td>
                </tr>
            </table>
        </div>
        <div class="box-footer">
            {!! \PaginationHelper::render($offset, $limit, $count, $baseUrl, []) !!}
        </div>

        <div class="modal fade bs-example-modal-lg" tabindex="-1" id="create"
             role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">x</span>
                        </button>
                        <h4 class="modal-title"
                            id="myModalLabel">Create new Blog</h4>
                    </div>
                    <div class="modal-body">
                        <div role="main">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">@lang('admin.pages.blogs.columns.title')</label>
                                        <input type="text" class="form-control" ng-model="blog.title" id="title" name="title">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="body">@lang('admin.pages.blogs.columns.body')</label>
                                        <textarea name="body" class="form-control" ng-model="blog.body" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="summary">@lang('admin.pages.blogs.columns.summary')</label>
                                        <textarea name="summary" class="form-control" ng-model="blog.summary" rows="5" ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="text-align: center">
                                <br>
                                <button type="button"
                                        class="btn btn-default"
                                        data-dismiss="modal">
                                    <span aria-hidden="true">Cancel</span>
                                </button>
                                <button type="button"
                                        class="btn btn-success"
                                        ng-click="storeBlog()">
                                    Submit
                                </button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
