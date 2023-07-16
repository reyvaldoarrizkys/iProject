<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
//return type redirectView
use Illuminate\View\View;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Storage;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   function index(Request $request) : View 
   {
        $pageNumber = $request->query('page', 1);
        $products = Products::orderBy('created_at', 'desc')->paginate(5, ['*'], 'page', $pageNumber);
        return view('products.index',compact('products','pageNumber'));
   }
   function produk()
   {
        $products = Products::all();
        return view('front.produk',compact('products'));
   }


   function store(Request $request) : RedirectResponse 
   {
        $this->validate($request, [
            'name'     => 'required|',
            'gambar'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'price'     => 'required|',
            'description'   => 'required|',
            'stock'     =>'required|'
        ]);
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/product', $gambar->hashName());
        $products = new Products;
        $products->name = $request->name;
        $products->gambar = $gambar->hashName();
        $products->price = $request->price;
        $products->description = $request->description;
        $products->stock = $request->stock;
        $products->save();
        return redirect()->route('products.index')->with(['success' => 'Product created successfully.']);;
   }

    /**
     * Display the specified resource.
     */
    public function show(Products $products) : View
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) : View
    {
        $products = Products::find($id);
        return view('products.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) : RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'stock' => 'required'
        ]);

        //get products by ID
        $products = Products::findOrFail($id);

        //check if gambar is uploaded
        if ($request->hasFile('gambar')) {

            //upload new gambar
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/product', $gambar->hashName());

            //delete old gambar
            Storage::delete('public/product/'.$products->gambar);

            //update products with new gambar
            $products->update([
                'name'     => $request->name,
                'price'     => $request->price,
                'description'     => $request->description,
                'gambar'     => $gambar->hashName(),
                'stock'     => $request->stock
            ]);

        } else {

            //update products without gambar
            $products->update([
                'name'     => $request->name,
                'price'     => $request->price,
                'description'     => $request->description,
                'stock'     => $request->stock
            ]);
        }
        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) : RedirectResponse
    {
        $products = \App\Models\Products::find($id);
        Storage::delete('public/product/'. $products->gambar);
        $products->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}
