@extends('layout.index')
@section('content')

<!-- Select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Customer Edit</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/customer">Customer List</a></li>
            <li class="breadcrumb-item active">Customer Edit</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-sm-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Customer</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/customer/{{$customer->customer_id}}" method="post">
                @method('put')
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Customer Name</label>
                  @if ($errors->has('customer_name'))
                  <div class="text-danger">*{{ $errors->first('customer_name') }}</div>
                  @endif
                  <input type="text" name="customer_name" value="{{$customer->customer_name}}" class="form-control {{$errors->has('customer_name') ? 'is-invalid' : ''}}" id="customer_name" placeholder="Enter Customer Name">
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Customer Age</label>
                          @if ($errors->has('customer_age'))
                          <div class="text-danger">*{{ $errors->first('customer_age') }}</div>
                          @endif
                          <input type="text" name="customer_age" value="{{$customer->customer_age}}" class="form-control {{$errors->has('customer_age') ? 'is-invalid' : ''}}" id="customer_age" placeholder="Enter Customer Age">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Customer Email</label>
                          @if ($errors->has('customer_email'))
                          <div class="text-danger">*{{ $errors->first('customer_email') }}</div>
                          @endif
                          <input type="text" name="customer_email" value="{{$customer->customer_email}}" class="form-control {{$errors->has('customer_email') ? 'is-invalid' : ''}}" id="customer_email" placeholder="Enter Customer Email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Customer Address</label>
                          @if ($errors->has('customer_address'))
                          <div class="text-danger">*{{ $errors->first('customer_address') }}</div>
                          @endif
                          <input type="text" name="customer_address" value="{{$customer->customer_address}}" class="form-control {{$errors->has('customer_address') ? 'is-invalid' : ''}}" id="customer_address" placeholder="Enter Customer Address">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Customer City</label>
                          @if ($errors->has('customer_city'))
                          <div class="text-danger">*{{ $errors->first('customer_city') }}</div>
                          @endif
                          <input type="text" name="customer_city" value="{{$customer->customer_city}}" class="form-control {{$errors->has('customer_city') ? 'is-invalid' : ''}}" id="customer_city" placeholder="Enter Customer city">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Customer Postal Code</label>
                          @if ($errors->has('customer_postal_code'))
                          <div class="text-danger">*{{ $errors->first('customer_postal_code') }}</div>
                          @endif
                          <input type="text" name="customer_postal_code" value="{{$customer->customer_postal_code}}" class="form-control {{$errors->has('customer_postal_code') ? 'is-invalid' : ''}}" id="customer_postal_code" placeholder="Enter Customer Postal Code">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Customer Phone</label>
                          @if ($errors->has('customer_phone'))
                          <div class="text-danger">*{{ $errors->first('customer_phone') }}</div>
                          @endif
                          <input type="text" name="customer_phone" value="{{$customer->customer_phone}}" class="form-control {{$errors->has('customer_phone') ? 'is-invalid' : ''}}" id="customer_phone" placeholder="Enter Customer Phone">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Customer Identity No</label>
                          @if ($errors->has('customer_identity_no'))
                          <div class="text-danger">*{{ $errors->first('customer_identity_no') }}</div>
                          @endif
                          <input type="text" name="customer_identity_no" value="{{$customer->customer_identity_no}}" class="form-control {{$errors->has('customer_identity_no') ? 'is-invalid' : ''}}" id="customer_identity_no" placeholder="Enter Customer Identity No">
                        </div>
                    </div>
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
