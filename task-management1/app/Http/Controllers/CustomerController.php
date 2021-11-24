<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManageModel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products   =  ManageModel::all();
      $params     = [
          'products' => $products,
      ];
      return view('module.customers.index',$params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('module.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ManageModel::create($request->only('name','category'));
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $products = ManageModel::find($id);
       dd($products);
       $params = [
           'products' => $products
       ];
       return view('module.customers.show',$params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // lấy id 
        $products = ManageModel::find($id);
        // in dữ liệu ra blade
        $params     = [
            'products' => $products,
        ];
        return view('module.customers.edit',$params);
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
        ManageModel::find($id)->update($request->only('name','category'));
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ManageModel::find($id)->delete();
        return redirect()->route('products.index');
    }
}
