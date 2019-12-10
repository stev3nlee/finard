@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Quotation
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Quotation</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Quotation detail
                </div>

                <div class="box-body">
                  <table class="table">
                    <tr>
                      <th>Name</th>
                      <th>:</th>
                      <th>{{ $data->name }}</th>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <th>:</th>
                      <th>{{ $data->email }}</th>
                    </tr>
                    <tr>
                      <th>Phone</th>
                      <th>:</th>
                      <th>{{ $data->phone }}</th>
                    </tr>
                    <tr>
                      <th>Subject</th>
                      <th>:</th>
                      <th>{{ $data->subject }}</th>
                    </tr>
                    <tr>
                      <th>Message</th>
                      <th>:</th>
                      <th>{{ $data->message }}</th>
                    </tr>
                    <tr>
                      <th>Stone</th>
                      <th>:</th>
                      <th>{{ $data->ring_detail }}</th>
                    </tr>
                    <tr>
                      <th>Setting</th>
                      <th>:</th>
                      <th>{{ $data->setting }}</th>
                    </tr>
                    <tr>
                      <th>Stone Carat (Weight)</th>
                      <th>:</th>
                      <th>{{ $data->carat }}</th>
                    </tr>
                    <tr>
                      <th>Budget (in Millions)</th>
                      <th>:</th>
                      <th>{{ $data->budged }}</th>
                    </tr>
                    <tr>
                      <th>Style References</th>
                      <th>:</th>
                      <th>@if($data->image) <img src="{{ asset('/upload/'.$data->image) }}" width="100" height="100" /> @else No Image @endif</th>
                    </tr>
                  </table>
                </div>
            </div>
        </div>
    </div>
@endsection
