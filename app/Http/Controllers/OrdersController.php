<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Customers;
use App\Models\Transaction;
use App\Models\Products;
use App\Models\OrderItems;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index() : View
    {
        $customers = Customers::all();
        $products = Products::all();
        $orders = DB::table('orders')
        ->select('orders.*', 'customers.name as customer_name', 'products.name as product_name', 'products.price', 'order_items.quantity')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->join('customers', 'orders.customers_id', '=', 'customers.id')
        ->where('orders.status', 1)
        ->latest()
        ->paginate(10);    
        return view('orders.index', compact('orders','customers','products'));
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
        $customerId = $request->customers_id;
        $totalAmount = $request->total_amount;
        $productId = $request->product_id;
        $quantity = $request->quantity;

        // Cari data customer berdasarkan $customerId menggunakan model Customers
        $customer = Customers::find($customerId);

        // Cari data product berdasarkan $productId menggunakan model Products
        $product = Products::find($productId);

        // Jika customer dan product ditemukan, kita lanjutkan menyimpan data ke tabel orders dan order_items.
        if ($customer && $product) {
            // Simpan data ke tabel orders menggunakan model Orders
            $order = new Orders;
            $order->customers_id = $customer->id;
            $order->order_date = date("Y/m/d");
            $order->total_amount = $totalAmount;
            $order->status = 1;
            $order->code = mt_rand(100, 999);
            $order->save();

            // Simpan data ke tabel order_items menggunakan model OrderItems
            $orderItem = new OrderItems;
            $orderItem->product_id = $product->id;
            $orderItem->quantity = $quantity;
            $orderItem->order_id = $order->id;
            $orderItem->total_amount_items = $product->price * $request->quantity;
            $orderItem->save();

            $transaction = new Transaction;
            $transaction->order_id = $orderItem->order_id;                ;
            $transaction->amount = $request->total_amount;
            $transaction->transaction_date = now();
            $transaction->save();
            // Redirect ke halaman yang diinginkan setelah berhasil menyimpan data
            return redirect()->route('orders.index')->with(['success' => 'Order created successfully.']);
            } else {
                // Tindakan yang diambil jika customer atau product tidak ditemukan.
                // Misalnya, lempar pesan error atau ambil tindakan sesuai kebutuhan Anda.
                return redirect()->back()->with(['error' => 'Customer or product not found.']);
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) : View
    {
        $id = 1; // Ganti 1 dengan ID pesanan yang sesuai
        // Join antara tabel orders dan order_items
        $orders = DB::table('orders')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->select('orders.*', 'order_items.product_id', 'order_items.quantity')
        ->where('orders.id','=','order_items.order_id')
        ->get();
        return view('products.index',compact('orders'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) : RedirectResponse
    {
        $id = 1; // Ganti 1 dengan ID pesanan yang sesuai

// Cari data pesanan berdasarkan ID dengan Query Builder
$order = DB::table('orders')->where('id', $id)->first();

// Jika pesanan ditemukan, lakukan validasi data
if ($order) {
    $request->validate([
        'customers_id' => 'required',
        'order_date' => 'required',
        'total_amount' => 'required'
    ]);

    // Update data pesanan menggunakan Query Builder
    DB::table('orders')
        ->where('id', $id)
        ->update([
            'customers_id' => $request->customers_id,
            'order_date' => $request->order_date,
            'total_amount' => $request->total_amount
        ]);

    // Redirect ke halaman yang diinginkan setelah berhasil menyimpan data
    return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
} else {
    // Tindakan yang diambil jika pesanan tidak ditemukan.
    // Misalnya, lempar pesan error atau ambil tindakan sesuai kebutuhan Anda.
    return redirect()->back()->with('error', 'Order not found.');
}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) : RedirectResponse
    {
        $orders = \App\Models\Orders::find($id);
        $orders->delete();
        return redirect()->route('orders.index')->with('success','Product deleted successfully');
    }
}
