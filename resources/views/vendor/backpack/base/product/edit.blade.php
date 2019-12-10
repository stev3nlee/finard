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
                    Update Product
                </div>

                <div class="box-body">
                  @include('vendor.backpack.base.inc.alert')
                  
                        <form role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/product/update') }}" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                          <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" value="{{ $data->name }}" class="form-control">
                            @if($errors->has('name')) <span class="help-block">{{ $errors->first('name') }}</span>  @endif
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input name="price" type="number" value="{{ $data->price }}" min=1 step=".01" class="form-control">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Sale Price</label>
                            <input name="sale_price" type="number" value="{{ $data->sale_price }}" min=1 step=".01" class="form-control">
                          </div>

                          <div class="form-group ">
                            <label for="exampleInputEmail1">Gold</label>
                            <input type="text" name="gold" value="{{ $data->gold }}" class="form-control">
                          </div>
                          <input type="hidden" name="id" value="{{ $data->id }}">

                          <div class="form-group">
                                <label for="exampleInputEmail1">Color</label>
                                <select class="form-control select2" multiple="multiple" name="color[]" id="color" data-placeholder="Select Color" style="width: 100%;">
                                  <?php
                                    for ($i = 0; $i < sizeof($color); $i++) {
                                      $inputted = false;
                                      for ($j = 0; $j < sizeof($data->color); $j++) {
                                        if ($data->color[$j]->id == $color[$i]->id) {
                                          echo '<option value="' .$color[$i]->id . '" selected="selected">'. $color[$i]->name.'</option>';
                                          $inputted = true;
                                          break;
                                        }
                                      }
                                      
                                      if (!$inputted) {
                                        echo '<option value="' .$color[$i]->id . '">'. $color[$i]->name.'</option>';
                                      }
                                    }
                                  ?>
                                </select>
                              </div>

                          <div class="form-group">
                                <label for="exampleInputEmail1">Category</label>
                                <select class="form-control select2" multiple="multiple" name="category[]" id="category" data-placeholder="Select Category" style="width: 100%;">
                                  <?php
                                    for ($i = 0; $i < sizeof($category); $i++) {
                                      $inputted = false;
                                      for ($j = 0; $j < sizeof($data->category); $j++) {
                                        if ($data->category[$j]->id == $category[$i]->id) {
                                          echo '<option value="' .$category[$i]->id . '" selected="selected">'. $category[$i]->name.'</option>';
                                          $inputted = true;
                                          break;
                                        }
                                      }
                                      
                                      if (!$inputted) {
                                        echo '<option value="' .$category[$i]->id . '">'. $category[$i]->name.'</option>';
                                      }
                                    }
                                  ?>
                                </select>
                              </div>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Sub Category</label>
                                <select class="form-control select2" multiple="multiple" name="sub_category[]" id="category" data-placeholder="Select Sub Category" style="width: 100%;">
                                  <?php
                                    for ($i = 0; $i < sizeof($sub_category); $i++) {
                                      $inputted = false;
                                      for ($j = 0; $j < sizeof($data->sub_category); $j++) {
                                        if ($data->sub_category[$j]->id == $sub_category[$i]->id) {
                                          echo '<option value="' .$sub_category[$i]->id . '" selected="selected">'. $sub_category[$i]->name.'</option>';
                                          $inputted = true;
                                          break;
                                        }
                                      }
                                      
                                      if (!$inputted) {
                                        echo '<option value="' .$sub_category[$i]->id . '">'. $sub_category[$i]->name.'</option>';
                                      }
                                    }
                                  ?>
                                </select>
                              </div>

                              <div id="block-images">
                                @foreach($data->product_image as $im)
                                <div class="form-inline" style="margin-bottom: 10px;">

                                  <label for="exampleInputEmail1">Image</label><br>
                                  <img src="{{ asset('/upload/'.$im->image) }}" width="10%"><br>
                                  <input type="file" name="image[]" class="form-control">
                                  <input type="hidden" name="old_image[]" value="{{ $im->image }}">
                                  <input type="hidden" name="product_image_id[]" value="{{ $im->id }}">
                                </div>
                                @endforeach

                                </div>
                                <button type="button" class="btn btn-success" data-count="{{ count($data->product_image) }}" id="addimages">Add Image</button>
                                <input type="hidden" name="total_images" id="total_images" value="{{ count($data->product_image) }}">
                                <br><br>

                         <!--  <div class="form-group @if($errors->has('image')) has-error @endif">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('/upload/'.$data->image) }}" width="100" height="100" />
                            @if($errors->has('image')) <span class="help-block">{{ $errors->first('image') }}</span>  @endif
                            <input type="hidden" name="old_image" value="{{ $data->image }}">
                          </div> -->


                          <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="description" class="form-control my-editor">{{ $data->description }}</textarea>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Size Chart</label>
                            <textarea name="size_chart" class="form-control my-editor">{{ $data->size_chart }}</textarea>
                          </div>

                          <input type="hidden" name="id" value="{{ $data->id }}">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                      </div>

                  
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
