@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        FAQ
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">FAQ</li>
      </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Create FAQ
                </div>

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/faq/insert') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
  
                      <div class="form-group">
                        <label for="exampleInputEmail1">Question</label>
                        <textarea name="question" class="form-control"></textarea> 
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Answer</label>
                        <textarea  name="answer" class="form-control my-editor"></textarea> 
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
