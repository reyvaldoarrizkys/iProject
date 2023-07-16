@extends('layouts-front.master', ['title' => 'Cart'])
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="/"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Cart</li>
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
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                @if (!empty($order))
                    @foreach ($order as $value)
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
                                <div class="col-lg-1 col-md-2 col-12">
                                    <a class="remove-item" href="{{ route('ordersDestroy', $value->item_id) }}"><i
                                            class="lni lni-close"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-1 col-md-1 col-12">

                    </div>
                @endif
            </div>
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
                                        <li class="last">You Pay<span>Rp
                                                {{ number_format($value->total_amount) }}</span></li>
                                    </ul>
                                    <div class="button">
                                        <form action="{{ route('checkoutPost') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="total_amount" value="{{ $value->total_amount }}">
                                            <input type="hidden" name="order_id" value="{{ $value->id }}">
                                            <button type="submit" class="btn">Checkout</button>
                                        </form>
                                        <a href="{{ route('home') }}" class="btn btn-alt mt-2">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
