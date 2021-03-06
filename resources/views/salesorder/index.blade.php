@extends('layout.index')
@section('title', 'Sales Order')
@section('content')

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- Theme style -->

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Sales Order List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Sales Order List</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <a href="/sales-order/create" class="btn btn-outline-primary mb-3"> Add Sales Order </a>
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

    <style>
        .table-list td {
            width: fit-content;
        }
    </style>

    <div class="table-list">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col table-responsive">
                        <div class="card" style="overflow-x: scroll;">
                            <div class="card-body">
                                <table class="table table-striped table-bordered " id="datatable">
                                    <thead class="thead-primary bg-primary text-white">
                                        <tr>
                                            <td>Product Name</td>
                                            <td>Brand</td>
                                            <td>Price</td>
                                            <td>Customer Name</td>
                                            <td>Customer Email</td>
                                            <td width="200px">action</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
    
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col">
                        <div class="d-flex justify-content-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- datatables --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <script>
        $(function () {
        $("#datatable").DataTable({
            processing: true,
            serverside: true,
            responsive: true,
            deferLoading: [ 57, 100 ],
            autoWidth:true,
            buttons: [
                        {
                            extend: 'pdf',
                            footer: true,
                            className: 'btnPrint',
                            exportOptions: {
                                    columns: [0,1,2,3]
                            }
                        },
                        {
                            extend: 'print',
                            footer: true,
                            className: 'btnPrint',
                            exportOptions: {
                                    columns: [0,1,2,3]
                            }
                        },
                    ],
            dom: 'Bfrtip',
            ajax: "{{route('get.salesorder')}}",
                    columns: [{
                            data: 'product_name',
                            name: 'product_name'
                        },
                        {
                            data: 'product_brand',
                            name: 'product_brand'
                        },
                        {
                            data: 'product_price',
                            name: 'product_price'
                        },
                        {
                            data: 'customer_name',
                            name: 'customer_name'
                        },
                        {
                            data: 'customer_email',
                            name: 'customer_email'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ]
        })
       });
    </script>

@endsection
