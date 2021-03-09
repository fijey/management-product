<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\SalesOrder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $countProduct = Product::count();
        $countBrand = Brand::count();
        $countCustomer = Customer::count();
        $countSalesOrder = SalesOrder::count();

        $latest = SalesOrder::join('customers', 'sales_orders.customer_id', 'customers.customer_id')
        ->join('products', 'sales_orders.product_id' , 'products.product_id')
        ->select('products.*', 'customers.*', 'sales_orders.*')
        ->orderBy('sales_orders.created_at', 'DESC')
        ->take(5)
        ->get();


        $data = [
            'countProduct' => $countProduct,
            'countBrand' => $countBrand,
            'countCustomer' => $countCustomer,
            'countSalesOrder' => $countSalesOrder,
            'latestOrder' => $latest
        ];

        return view('dashboard.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
}
