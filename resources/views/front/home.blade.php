@extends('layouts-front.master', ['title' => 'Home'])
@section('content')
    {{-- Fitur Slider  --}}
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <div class="hero-slider">
                            <div class="single-slider"
                                style="background-image:url({{ asset('front/assets/images/hero/xr3.png') }})">
                                <div class="content">
                                    <h2><span>Best Offers!</span>
                                        iPhone XR Yellow Edition
                                    </h2>
                                    <p>Apple iPhone XR smartphone. Announced Sep 2018. Features 6.1″ display, Apple A12 Bionic chipset, 12 MP primary camera, 7 MP front camera, 2942 mAh battery</p>
                                    <h3><span>Now Only</span> Rp 4.900.000 - Rp 5.500.000</h3>
                                    <div class="button">
                                        <a href="#trending-product" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slider"
                                style="background-image:url({{ asset('front/assets/images/hero/xr5.png') }})">
                                <div class="content">
                                    <h2><span style="color: white">Best Offers!</span>
                                        iPhone XR Blue Edition
                                    </h2>
                                    <p style="color: white">Apple iPhone XR smartphone. Announced Sep 2018. Features 6.1″ display, Apple A12 Bionic chipset, 12 MP primary camera, 7 MP front camera, 2942 mAh battery.</p>
                                    <h3><span style="color: white">Now Only:</span> Rp 4.900.000 - Rp 5.500.000</h3>
                                    <div class="button">
                                        <a href="#trending-product" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">

                            <div class="hero-small-banner"
                                style="background-image: url('{{ asset('front/assets/images/hero/slider-bnr.jpg') }}');">
                                <div class="content">
                                    <h2>
                                        <span>New Booming!</span>
                                        iPhone 12 Pro Max
                                    </h2>
                                    <h3>Rp. 10.500.000</h3>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12 col-md-6 col-12">

                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>Weekly Sale!</h2>
                                    <p>Saving up to 25% off all online store items this week.</p>
                                    <div class="button">
                                        <a class="btn" href="#trending-product">Shop Now</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- fitur trending produk -->
    <section class="trending-product section" id="trending-product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Product</h2>
                        <p>The iPhone is a popular and innovative smartphone designed and marketed by Apple Inc., known for
                            its sleek design, powerful performance, and user-friendly interface.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-4 mb-3">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Search Product...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Search</button>
                                @auth
                                <a href="{{ route('home') }}" class="btn btn-secondary">Show All</a>    
                                @endauth
                                @guest
                                <a href="/" class="btn btn-secondary">Show All</a>    
                                @endguest
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php $countData = $products->count(); ?>
                    @if ($countData < 1)
                        <h5 style="display: flex; justify-content: center; align-items: center;">Product Not Ready :)</h5>
                    @endif
                </div>
                @foreach ($products as $value)
                  @if ($value->stock > 0)
                    <style>
                        .product-image {
                            height: 200px;
                            /* You can adjust this value to your desired height */
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            overflow: hidden;
                        }

                        .product-image img {
                            width: 100%;
                            height: 100%;
                            object-fit: contain;
                        }
                    </style>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{ asset('storage/product/' . $value->gambar) }}" alt="Product Image">
                                <div class="button">
                                    @auth
                                        <a href="{{ route('ordersId', $value->id) }}" class="btn"><i
                                                class="lni lni-cart"></i>
                                            Add to Cart</a>
                                    @else
                                        <a href="/login" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                    @endauth
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">Phone</span>
                                <h4 class="title">
                                    <a href="product-grids.html">{{ $value->name }}</a>
                                </h4>
                                <ul class="review">
                                    <li><span>{{ $value->description }}</span></li>
                                </ul>
                                <div class="price">
                                    <span>Rp. {{ number_format($value->price) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    {{-- Tampilkan daftar produk disini --}}
                    @foreach ($products as $value)
                        <!-- Kode untuk menampilkan daftar produk -->
                    @endforeach
                </div>
            </div>

            <!-- Tampilkan tautan Previous dan Next -->
            <div class="row">
                <div class="col-12">
                    <div class="pagination right">
                        <ul class="pagination-list">
                            <li class="page-item @if (!$products->previousPageUrl()) disabled @endif">
                                @if ($products->previousPageUrl())
                                    <a class="page-link" href="{{ $products->previousPageUrl() }}"
                                        aria-label="Halaman Sebelumnya">Previous</a>
                                @else
                                    <span class="page-link" aria-hidden="true">Previous</span>
                                @endif
                            </li>
                            <li class="page-item @if (!$products->nextPageUrl()) disabled @endif">
                                @if ($products->nextPageUrl())
                                    <a class="page-link" href="{{ $products->nextPageUrl() }}"
                                        aria-label="Halaman Berikutnya">Next</a>
                                @else
                                    <span class="page-link" aria-hidden="true">Next</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('sweetalert::alert')
@endsection
