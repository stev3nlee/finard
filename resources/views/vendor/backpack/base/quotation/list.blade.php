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

                <div class="box-body">
                    <div class="dataTable_wrapper">
                        <table id="dataTable" class="table table-striped table-bordered table-hover datatable">
                            <thead>
                                <tr class="nosortable">
                                    <th class="table-actions">Actions</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Stone</th>
                                    <th>Setting</th>
                                    <th>Stone Carat</th>
                                    <th>Budged (in Millions)</th>
                                    <th>References</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody id="element-order">
                              @foreach ($data as $content)
                                <tr>
                                    <td>
                                       <div class="table-actions-hover">
                                            <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/quotation/detail/'.$content->id) }}"><i class="fa fa-eye fa-fw"></i></a>
                                            <a onclick="return confirm('Are you sure ?');" href="{{ url(config('backpack.base.route_prefix', 'admin').'/quotation/delete/'.$content->id) }}"><i class="fa fa-trash fa-fw"></i></a>
                                        </div>
                                    </td>
                                    <td>{{ $content->name }}</td>
                                    <td>{{ $content->email }}</td>
                                    <td>{{ $content->ring_detail }}</td>
                                    <td>{{ $content->setting }}</td>
                                    <td>{{ $content->carat }}</td>
                                    <td>{{ $content->budged }}</td>
                                    <td>
                                        @if($content->image != '')<img src="{{ asset('/upload/'.$content->image) }}" width="100" height="100" />@else No Image @endif
                                    </td>
                                    <td>{{ $content->created_at }}</td>
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
