@extends('layout.index')
@section('content')

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Product List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Product List</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <a href="/product/create" class="btn btn-outline-primary mb-3"> Add Product </a>

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
                                            <td width="200px">Product Description</td>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                processing: true,
                serverside: true,
                responsive: true,
                ajax: "{{route('get.product')}}",
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
                        data: 'product_description',
                        name: 'product_description'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
        });
    </script>
@endsection
