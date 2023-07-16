<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Orders;
use App\Models\Products;

class OrderItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index() : View
    {
        $order_items = OrderItems::latest()->paginate(10);
        $orders = Orders::all();
        $products = Products::all();
        return view('order_items.index',compact('order_items', 'orders', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    function store(Request $request) : RedirectResponse
    {
        $this->validate($request, [
            'order_id'     => 'required|',
            'product_id'     => 'required|',
            'quantity'   => 'required|'
        ]);
        
        \App\Models\OrderItems::create($request->all());
        return redirect()->route('order_items.index')->with(['success' => 'Order Items created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderItems $orderItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) : View
    {
        $order_items = OrderItems::find($id);
        return view('order_items.edit',compact('order_items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) : RedirectResponse
    {
        $request->validate([
            'order_id'     => 'required',
            'product_id'     => 'required',
            'quantity'   => 'required'
        ]);
        $order_items = OrderItems::findOrFail($id);
        $order_items->update($request->all());
        return redirect()->route('order_items.index')->with('success','Order Items updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) : RedirectResponse
    {
        $order_items = \App\Models\OrderItems::find($id);
        $order_items->delete();
        return redirect()->route('order_items.index')->with('success','Order Items deleted successfully');
    }
}
