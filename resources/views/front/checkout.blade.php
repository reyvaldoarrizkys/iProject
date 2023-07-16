@extends('layouts-front.master',['title'=>'checkout'])
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Payment</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="/"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Payment</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">

                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Price</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Total</p>
                        </div>
                    </div>
                </div>
             @foreach ($checkedOutOrders as $value)
                        <div class="cart-single-list">
                            <div class="row align-items-center">
                                <div class="col-lg-1 col-md-1 col-12">
                                    <img src="{{ asset('storage/product/' . $value->gambar) }}" alt="#">
                                </div>
                                <div class="col-lg-4 col-md-3 col-12">
                                    <h6 class="product-name">
                                        {{ $value->name }}
                                    </h6>
                                </div>
                                <div class="col-lg-2 col-md-2 col-12">
                                    <p>Rp. {{ number_format($value->price) }}</p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-12">
                                    <div class="count-input">
                                        <select class="form-control">
                                            <option>{{ $value->quantity }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-12">
                                    <p>Rp. {{ number_format($value->total_amount_items) }}</p>
                                </div>
                            </div>
                        </div>
            </div>
            @endforeach

            <div class="row">
                <div class="col-12">
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>Rp. {{ number_format($value->total_amount) }}</span>
                                        </li>
                                        <li>Shipping<span>Free</span></li>
                                        <li>Code Uniq Payment<span>Rp. {{number_format($value->code)}}</span></li>
                                        <li class="last">You Pay<span>Rp
                                                {{ number_format($value->total_amount+$value->code) }}</span></li>
                                        <li>No Rek BCA <span>0782748242784 AN Ayuy</span></li>
                                    </ul>
                                    <div class="button">
                                        <p>*Please send proof of payment to the WhatsApp number below</p>
                                        <a href="https://wa.me/6285719127681?text=Hello%20Admin%20I%20Want%20To%20Confirm%20Payment,%20Please%20Help,%20Thankyou&hearts;" class="btn btn-alt mt-2">WhatsApp &nbsp <i class="fab fa-whatsapp"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
