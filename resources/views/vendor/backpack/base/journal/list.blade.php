@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Journal
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Journal</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">

                <div class="box-header with-border">
                     @include('vendor.backpack.base.inc.alert')
                    <div class="box-title"><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/journal/create') }}" class="btn btn-success">Create Journal</a></div>
                </div>

                <div class="box-body">
                    <div class="dataTable_wrapper">
                        <table id="dataTable" class="table table-striped table-bordered table-hover datatable">
                            <thead>
                                <tr class="nosortable">
                                    <th class="table-actions">Actions</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id="element-order">
                              @foreach ($data as $content)
                                <tr>
                                    <td>
                                       <div class="table-actions-hover">
                                            <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/journal/edit/'.$content->id) }}"><i class="fa fa-pencil fa-fw"></i></a>
                                            <a onclick="return confirm('Are you sure ?');" href="{{ url(config('backpack.base.route_prefix', 'admin').'/journal/delete/'.$content->id) }}"><i class="fa fa-trash fa-fw"></i></a>
                                        </div>
                                    </td>
                                    <td>{{ $content->title }}</td>
                                    <td>
                                        <img src="{{ asset('/upload/'.$content->image) }}" width="40%" />
                                    </td>
                                    <td>{!! $content->description !!}</td>
                                    <td><?php if($content->status == 0){ ?><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/journal/status/'.$content->id.'/1') }}">Inactive</a><?php  }else{ ?><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/journal/status/'.$content->id.'/0') }}">Active</a><?php } ?></td>
                                    <td>{{ $content->date }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>
@endsection
