@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Product
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Product</li>
      </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    Create Product
                </div>

                <div class="box-body">
                    <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/product/insert') }}" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="form-group @if($errors->has('name')) has-error @endif">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control">
                        @if($errors->has('name')) <span class="help-block">{{ $errors->first('name') }}</span>  @endif
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input name="price" type="number" min=1 step=".01" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Sale Price</label>
                        <input name="sale_price" type="number" min=1 step=".01" class="form-control">
                      </div>

                      <div class="form-group ">
                        <label for="exampleInputEmail1">Gold</label>
                        <input type="text" name="gold" class="form-control">
                      </div>

                      <div class="form-group">
                            <label for="exampleInputEmail1">Color</label>
                            <select class="form-control select2" multiple="multiple" name="color[]" id="color" data-placeholder="Select Color" style="width: 100%;">
                              @foreach($color as $col)
                                <option value="{{$col->id}}">{{ $col->name }}</option>
                              @endforeach
                            </select>
                      </div>

                      <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <select class="form-control select2" multiple="multiple" name="category[]" id="category" data-placeholder="Select Category" style="width: 100%;">
                              @foreach($category as $content)
                                <option value="{{$content->id}}">{{ $content->name }}</option>
                              @endforeach
                            </select>
                      </div>

                      <div class="form-group">
                            <label for="exampleInputEmail1">Sub Category</label>
                            <select class="form-control select2" multiple="multiple" name="sub_category[]" id="category" data-placeholder="Select Sub Category" style="width: 100%;">
                              @foreach($sub_category as $sub)
                                <option value="{{$sub->id}}">{{ $sub->name }}</option>
                              @endforeach
                            </select>
                      </div>
                      
                      <div id="block-images">
                      <div class="form-inline" style="margin-bottom: 10px;">
                        <label for="exampleInputEmail1">Image</label><br>
                        <input type="file" name="image[]" class="form-control" required="required">
                        
                      </div>

                      </div>
                      <button type="button" class="btn btn-success" data-count="1" id="addimages">Add Image</button>
                      <input type="hidden" name="total_images" id="total_images" value="1">
                      <br><br>



                      <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea name="description" class="form-control my-editor"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Size Chart</label>
                        <textarea name="size_chart" class="form-control my-editor"></textarea>
                      </div>
                  
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after_scripts')
  <script>

        $('#addimages').click(function(){
        getCount = $(this).data('count')+1;
        $(this).data('count', getCount);
        $('#total_images').val(getCount);
        $('#block-images').append('<div class="form-inline" style="margin-bottom: 10px;">\
                                  <input type="file" class="form-control image" placeholder="image" name="image[]">\
                                  <button type="button" class="btn btnDelete btn-danger">Delete</button>\
                                 </div>');
      $('.btnDelete').click(function(){
        $(this).closest('.form-inline').remove();
      })


    });
    </script>
@endsection
