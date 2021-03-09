@extends('layout.index')
@section('content')

<!-- Select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Brand Create</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/brand">Brand List</a></li>
            <li class="breadcrumb-item active">Brand Create</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-sm-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Brand</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('brand.update', $brand->brand_id)}}" method="POST">
                @method('put')
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Brand Name</label>
                  @if ($errors->has('brand_name'))
                  <div class="text-danger">*{{ $errors->first('brand_name') }}</div>
                  @endif
                  <input type="text" name="brand_name" value="{{$brand->brand_name}}" class="form-control {{$errors->has('brand_name') ? 'is-invalid' : ''}}" id="brand_name" placeholder="Enter Brand Name">
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
