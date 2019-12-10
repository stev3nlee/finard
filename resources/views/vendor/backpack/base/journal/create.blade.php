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
                    Create Journal
                </div>

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/journal/insert') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="form-group @if($errors->has('title')) has-error @endif">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control">
                        @if($errors->has('title')) <span class="help-block">{{ $errors->first('title') }}</span>  @endif
                      </div>
                      
                      <div class="form-group @if($errors->has('image')) has-error @endif">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="image" class="form-control" required="required">
                        @if($errors->has('image')) <span class="help-block">{{ $errors->first('image') }}</span>  @endif
                      </div>

                      <div class="form-group ">
                        <label for="exampleInputEmail1">Date</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" autocomplete="off" required="required" name="date" class="form-control pull-right" id="datepicker">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea name="description" class="form-control my-editor"></textarea>
                      </div>
                  
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
