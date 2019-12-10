@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Admin
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Admin</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Update Admin
                </div>

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/admin/update') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="form-group @if($errors->has('username')) has-error @endif">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" value="{{ $data->username }}" class="form-control">
                        @if($errors->has('username')) <span class="help-block">{{ $errors->first('username') }}</span>  @endif
                      </div>

                      <div class="form-group @if($errors->has('password')) has-error @endif">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" name="password" autocomplete="off" class="form-control" placeholder="Leave empty in don't want change password">
                        @if($errors->has('password')) <span class="help-block">{{ $errors->first('password') }}</span>  @endif
                      </div>
                      
                      <input type="hidden" name="id" value="{{ $data->id }}">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
