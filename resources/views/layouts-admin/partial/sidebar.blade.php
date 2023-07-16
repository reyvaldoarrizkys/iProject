<div class="app-brand demo">
    <img src="{{ asset('admin/assets/img/iproject2.png') }}" alt="" srcset="" width="180px">
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
</div>

<div class="menu-inner-shadow"></div>

<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item @if (Request::url() == route('dashboard')) active @endif" id="side-dashboard">
        <a href="{{ route('dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
    <!-- Tables -->
    <li class="menu-item @if (Request::url() == route('products.index')) active @endif" id="side-products">
        <a href="{{ route('products.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxl-apple"></i>
            <div data-i18n="Tables">Tables Products</div>
        </a>
    </li>
    <li class="menu-item @if (Request::url() == route('customers.index')) active @endif" id="side-customers">
        <a href="{{ route('customers.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-group"></i>
            <div data-i18n="Tables">Tables Customers</div>
        </a>
    </li>
    <li class="menu-item @if (Request::url() == route('orders.index')) active @endif" id="side-orders">
        <a href="{{ route('orders.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-cart-add"></i>
            <div data-i18n="Tables">Tables Orders</div>
        </a>
    </li>
    <li class="menu-item @if (Request::url() == route('transactions.index')) active @endif" id="side-transactions">
      <a href="{{ route('transactions.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-wallet"></i>
          <div data-i18n="Tables">Tables Transactions</div>
      </a>
  </li>
</ul>
