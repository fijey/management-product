@extends('layout.index')
@section('content')

<!-- Select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Product Edit</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/product">Product List</a></li>
            <li class="breadcrumb-item active">Product Edit</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-sm-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/product/{{$product->product_id}}" method="post">
              @method('put')
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Name</label>
                  @if ($errors->has('product_name'))
                  <div class="text-danger">*{{ $errors->first('product_name') }}</div>
                  @endif
                  <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control {{$errors->has('product_name') ? 'is-invalid' : ''}}" id="product_name" placeholder="Enter Product Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Price</label>
                  @if ($errors->has('product_price'))
                  <div class="text-danger">*{{ $errors->first('product_price') }}</div>
                  @endif
                  <input type="number" name="product_price" value="{{$product->product_price}}" class="form-control {{$errors->has('product_name') ? 'is-invalid' : ''}}" id="product_name" placeholder="Enter Product Price">
                </div>
                
                <div class="form-group">
                    <label>Product Brand</label>
                    @if ($errors->has('product_brand'))
                    <div class="text-danger">*{{ $errors->first('product_brand') }}</div>
                    @endif
                    <select name="product_brand" class="form-control select2bs4 {{$errors->has('product_brand') ? 'is-invalid' : ''}}" style="width: 100%;">
                      @forelse ($brand as $item)
                      <option value="{{$item->brand_id}}" {{$item->brand_id == $product->product_brand ? 'selected' : ''}}>{{$item->brand_name}}</option>
                      @empty
                          
                      @endforelse
                    </select>
                    <a href="/managementbrand" class=" mt-2 btn btn-sm btn-primary">Add Brand</a>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Add Picture</label>
                  @if ($errors->has('product_picture'))
                  <div class="text-danger">*{{ $errors->first('product_picture') }}</div>
                  @endif
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="product_picture" value="{{old('product_picture')}}" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Description</label>
                    @if ($errors->has('product_description'))
                    <div class="text-danger">*{{ $errors->first('product_description') }}</div>
                    @endif
                    <textarea name="product_description" class="form-control" id="summernote" placeholder="Enter Product Description">{{$product->product_description}}</textarea>
                  </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

          <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
          <!-- Summernote -->
          <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
          <!-- bs-custom-file-input -->
          <script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
          <script>
            $(function () {
              //Initialize Select2 Elements
              $('.select2').select2()
          
              //Initialize Select2 Elements
              $('.select2bs4').select2({
                theme: 'bootstrap4'
              })
            })
              </script>
            <script>
                $(function () {
                  // Summernote
                  $('#summernote').summernote()

                })
            </script>
            <script>
                $(function () {
                  bsCustomFileInput.init();
                });
                </script>
@endsection
