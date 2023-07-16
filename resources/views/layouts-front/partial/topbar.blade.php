<div class="topbar">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="top-left">
                    {{-- <ul class="menu-top-link">
                        <li>
                            <div class="select-position">
                                <select id="select4">
                                    <option value="0" selected="">$ USD</option>
                                    <option value="1">€ EURO</option>
                                    <option value="2">$ CAD</option>
                                    <option value="3">₹ INR</option>
                                    <option value="4">¥ CNY</option>
                                    <option value="5">৳ BDT</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="select-position">
                                <select id="select5">
                                    <option value="0" selected="">English</option>
                                    <option value="1">Español</option>
                                    <option value="2">Filipino</option>
                                    <option value="3">Français</option>
                                    <option value="4">العربية</option>
                                    <option value="5">हिन्दी</option>
                                    <option value="6">বাংলা</option>
                                </select>
                            </div>
                        </li>
                    </ul> --}}
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="top-middle">
                    {{-- <ul class="useful-links">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul> --}}
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="top-end">
                    <div class="user">
                        <i class="lni lni-user"></i>
                        @auth
                            <?php
                            $customerId = Auth::user()->id;
                            $customer = \App\Models\Customers::where('user_id', $customerId)->first();
                            ?>
                            @isset($customer)
                                <a href="{{ route('profile', $customer->id) }}" class="main-btn">
                                    {{ auth()->user()->name }}
                                </a>
                            @endisset
                        @endauth
                        @guest
                            Hallo, guest
                        @endguest

                    </div>
                    <ul class="user-login">
                        @guest
                            <li>
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">Register</a>
                            </li>
                        @endguest
                        @auth
                            <li>
                                <a href="/logout">Logout</a>
                            </li>
                        @endauth
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="header-middle">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3 col-7">
                <img src="{{ asset('front/assets/images/logo-landing.png') }}" alt="Logo">

            </div>
            <div class="col-lg-5 col-md-7 d-xs-none">

            </div>
            <div class="col-lg-4 col-md-2 col-5">
                <div class="middle-right-area">
                    <div class="nav-hotline">
                        <i class="lni lni-phone"></i>
                        <h3>Hotline:
                            <span>(+62) 812 8229 8326</span>
                        </h3>
                    </div>
                    <div class="navbar-cart">
                        <div class="cart-items">
                            @guest
                                <a href="{{ route('login') }}" class="main-btn">
                                    <i class="lni lni-cart"></i>
                                    <span class="total-items">0</span>
                                </a>
                            @endguest
                            @auth
                                <?php
                                $customerId = Auth::user()->id;
                                $order = DB::table('orders')
                                    ->join('customers', 'orders.customers_id', '=', 'customers.id')
                                    ->join('order_items', 'orders.id', '=', 'order_items.order_id')
                                    ->where('customers.user_id', '=', $customerId)
                                    ->whereIn('orders.status', ['0', '1']) // Menambahkan kondisi untuk status 0 atau 1
                                    ->get();
                                $notif = $order->where('status', '0')->count();
                                ?>

                                <a href="{{ $notif > 0 ? route('cart') : route('home') }}" class="main-btn">
                                    <i class="lni lni-cart"></i>
                                    <span class="total-items">{{ $notif }}</span>
                                </a>

                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- navbar  --}}
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-8 col-md-6 col-12">
            <div class="nav-inner">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                        <ul id="nav" class="navbar-nav ms-auto">
                            <li class="nav-item">
                                @guest
                                    <a href="/" aria-label="Toggle navigation">Home</a>
                                @endguest
                                @auth
                                    <a href="{{ route('home') }}" aria-label="Toggle navigation">Home</a>
                                @endauth
                            </li>
                            @auth
                                <?php
                                $customerId = Auth::user()->id;
                                $orderStatus1 = DB::table('orders')
                                    ->join('customers', 'orders.customers_id', '=', 'customers.id')
                                    ->where('customers.user_id', '=', $customerId)
                                    ->where('orders.status', '=', '1')
                                    ->count();
                                
                                $orderStatus2 = DB::table('orders')
                                    ->join('customers', 'orders.customers_id', '=', 'customers.id')
                                    ->where('customers.user_id', '=', $customerId)
                                    ->where('orders.status', '=', '2')
                                    ->count();
                                ?>
                                @if ($orderStatus1 > 0 && $orderStatus2 == 0)
                                    <li class="nav-item">
                                        <a href="{{ route('checkout') }}" aria-label="Toggle navigation">Continue
                                            Payment</a>
                                    </li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
