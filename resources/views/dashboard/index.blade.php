@extends('layout.index')
@section('title', 'Dashboard')
@section('content')
<div class="row mb-2">
  <div class="col-sm-6">
      <h1 class="m-0">Dashboard</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
      </ol>
  </div><!-- /.col -->
</div><!-- /.row -->

<h5 class="mb-2">Info Box</h5>
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-archive"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Product</span>
                <span class="info-box-number">{{$countProduct}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-building"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Brand</span>
                <span class="info-box-number">{{$countBrand}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Customers</span>
                <span class="info-box-number">{{$countCustomer}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-list"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales Order</span>
                <span class="info-box-number">{{$countSalesOrder}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>

        <h5 class="mb-2">Info Sales Order</h5>
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Product Name</th>
                      <th>Brand</th>
                      <th>Price</th>
                      <th>Customer Name</th>
                      <th>Customer Email</th>
                      <th>Customer Address</th>
                    </tr>
                    </thead>
                    <tbody>
                      @forelse ($latestOrder as $item)
                      <tr>
                        <td>{{$item->order_id}}</a></td>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->product_brand}}</td>
                        <td>{{$item->product_price}}</td>
                        <td>{{$item->customer_name}}</td>
                        <td>{{$item->customer_email}}</td>
                        <td>{{$item->customer_address}}</td>
                      </tr>
                          
                      @empty
                          
                      @endforelse
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
        </div>

@endsection