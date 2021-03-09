<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestCreateSalesOrder;

use App\Models\SalesOrder;
use App\Models\Product;
use App\Models\Customer;

class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('salesorder.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        $product = Product::all();

        $data = [
            'customer' => $customer,
            'product' => $product,
        ];

        return view('salesorder.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreateSalesOrder $request)
    {
        $sales = SalesOrder::create($request->validated());

        return redirect('/sales-order')->with('success', 'Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sales = SalesOrder::find($id)->where('order_id', $id)->first();

        $customer = Customer::all();
        $product = Product::all();

        $data = [
            'customer' => $customer,
            'product' => $product,
            'data' => $sales
        ];


        return view('salesorder.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getsalesorder() {
        
        $data = SalesOrder::join('customers', 'sales_orders.customer_id', 'customers.customer_id')
        ->join('products', 'sales_orders.product_id' , 'products.product_id')
        ->select('products.*', 'customers.*', 'sales_orders.*');

        return \DataTables::eloquent($data)
        ->addColumn('action', function($s) {
            return '<a href="'.route('sales-order.show',$s->order_id.'/edit').'" class="btn btn-warning">
            <i class="fas fa-fw fa-edit"></i></a> <a href="'.route('sales-order.destroy',$s->order_id).'" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>';
        })
        ->rawColumns(['action'])
        ->toJson();

    }
}
