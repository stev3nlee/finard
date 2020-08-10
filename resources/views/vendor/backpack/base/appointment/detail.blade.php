@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Appointment
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Appointment</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Appointment detail
                </div>

                <div class="box-body">
                  <table class="table">
                    <tr>
                      <th>Type</th>
                      <th>:</th>
                      <th>{{ $data->type }}</th>
                    </tr>
                    <tr>
                      <th>Date of Appointment</th>
                      <th>:</th>
                      <th>{{ date('d F Y', strtotime($data->date)) }}, {{ $data->time }}</th>
                    </tr>
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
                    @if($data->type == 'Wedding Band Consultation')
                      <tr>
                        <th>Groom's ring size</th>
                        <th>:</th>
                        <th>{{ $data->grooms_ring_size }}</th>
                      </tr>
                      <tr>
                        <th>Bride's ring size</th>
                        <th>:</th>
                        <th>{{ $data->brides_ring_size }}</th>
                      </tr>
                    @endif
                    <tr>
                      <th>Diamond shape(s) you are interested</th>
                      <th>:</th>
                      <th>{{ $data->diamond_shapes }}</th>
                    </tr>
                    @if($data->type == 'Engagement Ring Consultation')
                      <tr>
                        <th>Desired carat weight</th>
                        <th>:</th>
                        <th>{{ $data->carat_weight }}</th>
                      </tr>
                      <tr>
                        <th>Styles you are interested</th>
                        <th>:</th>
                        <th>{{ $data->style }}</th>
                      </tr>
                      <tr>
                        <th>Budget</th>
                        <th>:</th>
                        <th>{{ $data->budget }}</th>
                      </tr>
                    @endif

                    <tr>
                      <th>Will you be joining by yourself or with a guest</th>
                      <th>:</th>
                      <th>{{ $data->with_guest }}</th>
                    </tr>
                    <tr>
                      <th>Guest’s Name</th>
                      <th>:</th>
                      <th>{{ $data->guest_name }}</th>
                    </tr>
                    <tr>
                      <th>Guest’s Email</th>
                      <th>:</th>
                      <th>{{ $data->guest_email }}</th>
                    </tr>
                    
                    <tr>
                      <th>What would you like to achieve through this appointment?</th>
                      <th>:</th>
                      <th>{{ $data->achieve }}</th>
                    </tr>
                  </table>
                </div>
            </div>
        </div>
    </div>
@endsection
