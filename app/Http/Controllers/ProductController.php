<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Response;

use Auth;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->hasRole(['SuperAdmin', 'Admin', 'User']))
        {
            $products = Product::all();
            return $products;
        }
        return response(['Message'=>'No Permission'], 403);
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
        $request->validate([
            'product_name'=>'required',
            'product_code'=>'required',
            'product_price'=>'required',
        ]);

        $data = json_decode($request->getContent(), true);
        $products = new Product([
            'product_name'  =>  $data['product_name'],
            'product_code' => $data['product_code'],
            'product_price' => $data['product_price'],
        ]);
        $products->save();
        return response(['Message'=>'Product Successfuully Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        return $products;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if (Auth::user()->hasRole(['Superadmin', 'Admin']))
        // {
        //     abort(403);
        //     // return Auth::user();
      
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

        $products = Product::find($id);
        if (Auth::user()->hasRole(['SuperAdmin', 'Admin']))
        {
            $data = json_decode($request->getContent(), true);
            $products->product_name = $data['product_name'];
            $products->product_code = $data['product_code'];
            $products->product_price = $data['product_price'];
            $products->save();
            return $products;
        }
        return response(['Message'=>'No Permission'], 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->hasRole(['SuperAdmin', 'Admin']))
        {
            $data = Product::destroy($id);
            return response(['Message'=>'Product Successfully Deleted'], 200);
        }
        return response(['Message'=>'No Permission'], 403);
    }
}
