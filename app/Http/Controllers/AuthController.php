<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Auth;
//return type redirectView
use Illuminate\View\View;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Hash;
use Str;

class AuthController extends Controller
{
    function getLogin() : View {
        return view('auths.login');
    }
    function postLogin(Request $request) : RedirectResponse {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/s'
         ]);
         if(Auth::attempt($request->only('email','password'))){
            if(Auth::user()->role == 'admin'){
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('home');
            }
         }else{
            return redirect()->route('login');
         }
    }
    // public function postLogin(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/s'
    //      ]);
    //      if(Auth::attempt($request->only('email','password'))){
    //         Auth::attempt($request->only('email','password'));
    //         if(auth()->user()->role == 'admin'){
    //            return redirect('/dashboard');
    //         }else{
    //            return redirect('/home');
    //         }
    //      }else{
    //         return redirect('/login');
    //      }
    // }
    public function getRegister()
    {
        return view('auths.register');
    }
    public function postRegister(Request $request)
    {
        

        $user = new \App\Models\User;
        $user->role = 'customer';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(60);
        $user->save();
        
        // Authentikasi pengguna baru
        Auth::login($user);
        
        // insert ke table customers
        $customers = \App\Models\Customers::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone
        ]);
        
        // Setelah autentikasi, Anda dapat melakukan redirect ke halaman yang sesuai
        return redirect()->route('login')->with('success', 'Registration successful. Please Login!.');
    }
    public function logout()
    {
            // Lakukan logout
         Auth::logout();
         return redirect('/');
    }
    
}
