<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\RequestCreateCustomer;
use App\Http\Requests\RequestUpdateCustomer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreateCustomer $request)
    {
        $customer = Customer::create($request->validated());

        return redirect('/customer')->with('success', 'Customer Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id)->where('customer_id', $id)->first();

        $data = [
            'customer' => $customer
        ];

        return view('customer.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(RequestUpdateCustomer $request,$id)
    {   
        $this->validate($request, [              
            'customer_email'=> 'required',
            Rule::unique('customers')->ignore($id),
            ]);   

        $customer = Customer::find($id);
        $customer->update($request->validated());

        return redirect('/customer')->with('success', 'Customer Has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer=Customer::find($id);
        $customer->delete();
        return redirect('/customer')->with('message', 'Customer Deleted Successfully');
    }

    public function getcustomer() {
        $data = Customer::select('*');

        return \DataTables::eloquent($data)
        ->addColumn('action', function($s) {
            return '<a href="'.route('customer.show',$s->customer_id.'/edit').'" class="btn btn-warning">
            <i class="fas fa-fw fa-edit"></i></a> <a href="'.route('customer.destroy',$s->customer_id).'" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>';
        })
        ->rawColumns(['action'])
        ->toJson();
    }
}
