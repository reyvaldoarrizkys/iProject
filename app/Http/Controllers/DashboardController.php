<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Transaction;
use App\Models\Customers;
use App\Models\Orders;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCount = Products::count();

        // Count transactions with status 1 from orders table
        $transactionCountStatus1 = Transaction::whereIn('order_id', function ($query) {
            $query->select('id')->from('orders')->where('status', 1);
        })->count();

        // Count transactions with status 2 from orders table
        $transactionCountStatus2 = Transaction::whereIn('order_id', function ($query) {
            $query->select('id')->from('orders')->where('status', 2);
        })->count();

        // Calculate total revenue from transactions with status 2
        $totalRevenue = Transaction::whereIn('order_id', function ($query) {
            $query->select('id')->from('orders')->where('status', 2);
        })->sum('amount');

        // Count customers
        $customerCount = Customers::count();

        // Calculate total products sold based on order_items quantity
        $productsSoldCount = Products::join('order_items', 'products.id', '=', 'order_items.product_id')
            ->sum('order_items.quantity');
        return view('dashboard.dashboard',compact('productCount','transactionCountStatus1','transactionCountStatus2','customerCount','productsSoldCount','totalRevenue'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
