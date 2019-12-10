@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Sub Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Sub Category</li>
      </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Create Sub Category
                </div>

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/sub_category/insert') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="form-group @if($errors->has('name')) has-error  @endif">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control">
                         @if($errors->has('name')) <span class="help-block">{{ $errors->first('name') }}</span>  @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" name="description" class="form-control">
                      </div>

                      <div class="form-group @if($errors->has('category_id')) has-error  @endif">
                        <label for="exampleInputEmail1">Category</label>
                        <select class="form-control" name="category_id">

                        <option value="">Select Category</option>

                        @foreach ($category as $content)
                          <option value="{{ $content->id }}">
                              {{ $content->name }}
                          </option>
                        @endforeach
                        </select>
                        @if($errors->has('category_id')) <span class="help-block">The category field is required.</span>  @endif
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
