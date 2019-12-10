@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Contact
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Contact</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Contact detail
                </div>

                <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name : </label>
                        {{ $data->name }}
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email : </label>
                        {{ $data->email }}
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Phone : </label>
                        {{ $data->phone }}
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Subject : </label>
                        {{ $data->subject }}
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Message : </label>
                        {{ $data->message }}
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
