<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Http\Request;
//Return type  redirectView
use Illuminate\View\View;
use Hash;
use Str;
use Auth;
use Illuminate\Http\RedirectResponse;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index() : View
    {
        $customers = Customers::latest()->paginate(10);
        return view('customers.index',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    function store(Request $request) : RedirectResponse
    {
        $this->validate($request, [
            'name'     => 'required|',
            'email'   => 'required|',
            'address'     => 'required|',
            'phone'     =>'required|'
        ]);
        // insert ke table user
        $user = new \App\Models\User;
        $user->role = 'customer';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // insert ke table customers
        $request->request->add(['user_id' => $user->id ]);
        $customers = \App\Models\Customers::create($request->all());
        return redirect()->route('customers.index')->with(['success' => 'Customers created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customers) : View
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) : View
    {
        $customers = Customers::find($id);
        return view('customers.edit',compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) : RedirectResponse
    {
        $request->validate([
            'name'     => 'required',
            'email'   => 'required',
            'address'     => 'required',
            'phone'     =>'required'
        ]);
        $customers = Customers::findOrFail($id);
        $customers->update($request->all());
        return redirect()->route('customers.index')->with('success','Customers updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) : RedirectResponse
    {
        $customers = \App\Models\Customers::find($id);
        if (!$customers) {
            return redirect()->route('customers.index')->with('error', 'Customer Not Found');
        }
        $customers->delete();
        $user = \App\Models\User::where('email', $customers->email)->first();
        if ($user) {
         $user->delete();
         }
        return redirect()->route('customers.index')->with('success','Customers deleted successfully');
    }

}
