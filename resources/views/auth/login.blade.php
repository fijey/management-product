<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  @if (session('success'))
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Success</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      {{session('success')}}
    </div>
    <!-- /.card-body -->
  </div>
  @endif
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/index2.html" class="h1"><b>Phone</b>Ku</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to open dashboard</p>


      <form action="/login" method="post">
        @csrf
        <div class="input-group mb-3">
          <input name="email" value="{{old('email')}}" type="email" class="form-control {{$errors->has('email') ?  'is-invalid' : ''}}" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="Password ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        <div class="row">
          <div class="col-8">
           
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

    
      <p class="mb-0">
        <a href="/register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/js/adminlte.min.js"></script>
</body>
</html>
