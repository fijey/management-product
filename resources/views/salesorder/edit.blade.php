@extends('layout.index')
@section('content')

<!-- Select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Sales Order edit</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/sales-order">Sales Order List</a></li>
            <li class="breadcrumb-item active">Sales Order Edit</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-sm-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Sales Order</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/sales-order" method="post">
                @csrf
              <div class="card-body">

                <div class="form-group">
                    <label> Customer Name </label>
                    @if ($errors->has('customer_id'))
                    <div class="text-danger">*{{ $errors->first('customer_id') }}</div>
                    @endif
                    <select name="customer_id" class="form-control select2bs4 {{$errors->has('customer_id') ? 'is-invalid' : ''}}" style="width: 100%;">
                      @forelse ($customer as $item)
                      <option value="{{$item->customer_id}}" {{$data->customer_id == $item->customer_id ? 'selected' : ''}}>{{$item->customer_name}}</option>                        
                      @empty
                      <option disabled>Belum ada Data</option>
                      @endforelse
                    </select>
                </div>

                <div class="form-group">
                    <label> Buy Product </label>
                    @if ($errors->has('product_id'))
                    <div class="text-danger">*{{ $errors->first('product_id') }}</div>
                    @endif
                    <select name="product_id" class="form-control select2bs4 {{$errors->has('product_id') ? 'is-invalid' : ''}}" style="width: 100%;">
                      @forelse ($product as $item)
                      <option value="{{$item->product_id}}" {{$data->product_id == $item->product_id ? 'selected' : ''}}>{{$item->product_name}}</option>                        
                      @empty
                      <option disabled>Belum ada Data</option>
                      @endforelse
                    </select>
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
