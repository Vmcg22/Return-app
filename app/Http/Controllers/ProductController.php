<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Models\Models;
use App\Models\Product;
use Illuminate\Http\Request;
use Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = DB::table('products')->get();
        $products = Product::all();
        return view('layouts.products.index', compact('products'));
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
    public function store(ProductRequest $request)
    {
        $producto = new Product();
        $producto->name = "Product From ".$request->name;
        $producto->quantity = $request->quantity;
        $producto->unit_price = $request->unit_price;
        $producto->description = $request->description;
        $producto->total_cost = $producto->quantity * $producto->unit_price;

        $producto->save();

        /*Para que no de error Sweet Alert deben corre los comandos 
            php artisan sweetalert:publish
            composer require realrashid/sweet-alert
        */
        alert()->success('Producto guardado correctamente');

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
