<?php

namespace App\Http\Controllers;
use App\Models\Customers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
}

function index() : View
    {
        $customers = Customers::all();
        return view('front.profile',compact('customers'));
    }
