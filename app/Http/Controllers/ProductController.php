<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\RequestCreateProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreateProduct $request)
    {
        $product = Product::create($request->validated());
        
        $pathimg = $request->get('product_brand');
		$newstr = preg_replace('/\s/', '', $pathimg);
		$path = "img/product/$newstr/";
        
        if ($request->hasfile('img')) {
			$request->file('img')->move($path , $request->file('img')->getClientOriginalName());
			$product->product_picture = $path . $request->file('img')->getClientOriginalName();
            $product->update();
		}


        return redirect('/product')->with('message', 'Product Added Successfully');
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
        $product=Product::find($id);
        $product->delete();
        return redirect('/product')->with('message', 'Product Deleted Successfully');
    }

    public function getProduct() {
        $data = Product::select('*');

        return \DataTables::eloquent($data)
        ->addColumn('action', function($s) {
            return '<a href="'.route('product.show',$s->product_id).'" class="btn btn-warning">
            <i class="fas fa-fw fa-edit"></i></a> <a href="'.route('product.destroy',$s->product_id).'" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>';
        })
        ->rawColumns(['action'])
        ->toJson();

    }
}
