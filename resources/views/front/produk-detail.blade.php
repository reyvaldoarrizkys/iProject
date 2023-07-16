@extends('layouts-front.master', ['title' => 'Product Detail'])
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Product detail</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Product detail</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src="{{ asset('/storage/product/' . $products->gambar) }}"
                                        id="current" alt="#">
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{ $products->name }}</h2>
                            <h3 class="price">Rp. {{ number_format($products->price) }}</h3>
                            <p class="info-text">{{ $products->description }}</p>
                            <div class="row">
                                <form action="{{route('ordersPost',$products->id)}}" method="POST">
                                    @csrf
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group quantity">
                                        <label for="color">Quantity</label>
                                        <input type="text" name="quantity" class="form-control">
                                        <p class="info-text">Stock : {{ $products->stock }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-content">
                                <div class="row align-items-end">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="button cart-button">
                                            <button class="btn" type="submit" style="width: 100%;">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                 </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
