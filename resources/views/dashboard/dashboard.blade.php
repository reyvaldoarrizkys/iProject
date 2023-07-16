@extends('layouts-admin.master', ['title' => 'Dasboard'])
@section('content')
    <p><?php echo 'Report : ' . (int) date('Y'); ?></p>
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card bg-primary text-white mb-3">
                <div class="card-header">Customers</div>
                <div class="card-body">
                    <h5 class="card-title text-white"> {{$customerCount}} Customers Listed</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-warning text-white mb-3">
                <div class="card-header">Produts</div>
                <div class="card-body">
                    <h5 class="card-title text-white"> {{$productCount}} Products Listed</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-success text-white mb-3">
                <div class="card-header">Transactions</div>
                <div class="card-body">
                    <h5 class="card-title text-white"> Already Paid: {{$transactionCountStatus2}}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-primary text-white mb-3">
                <div class="card-header"> Total Revenue</div>
                <div class="card-body">
                    <h5 class="card-title text-white">Income Rp. {{number_format($totalRevenue)}}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-warning text-white mb-3">
                <div class="card-header">Products Sold</div>
                <div class="card-body">
                    <h5 class="card-title text-white">{{$productsSoldCount}} Products Sold</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-success text-white mb-3">
                <div class="card-header">Transactions</div>
                <div class="card-body">
                    <h5 class="card-title text-white"> Not Paid: {{$transactionCountStatus1}}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
