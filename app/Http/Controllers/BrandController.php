<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\RequestCreateBrand;
use Carbon\Carbon;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('brand.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreateBrand $request)
    {
        $product = Brand::create($request->validated());

        return redirect('/brand')->with('success', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd("show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id)->where('brand_id',$id)->first();
        $data = [
            'brand' => $brand
        ];

        return view('brand.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestCreateBrand $request, $id)
    {
        $brand = Brand::find($id);
        $brand->update($request->validated(['brand_name']));

        return redirect('/brand')->with('success', 'Brand Has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return redirect('/brand')->with('success', 'Brand Has been Deleted');
    }

    public function getbrand() {
     
        $data = Brand::select('*');
    
        return \DataTables::eloquent($data)
        ->addColumn('action', function($s) {
            return '<a href="'.route('brand.show',$s->brand_id.'/edit').'" class="btn btn-warning">
            <i class="fas fa-fw fa-edit"></i></a> <a href="'.route('brand.destroy',$s->brand_id).'" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>';
        })
        ->editColumn('created_at', function ($data) {
            return [
                'display' => Carbon::parse($data->created_at)->format('D, m M Y H:i'),
                'timestamp' => $data->created_at->timestamp
            ];
        })
        ->rawColumns(['action', 'created_at'])
        ->toJson();
    }
}
