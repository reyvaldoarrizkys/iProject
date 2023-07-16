@extends('layouts-admin.master', ['title' => 'Orders'])

@section('content')
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Update Orders</h5>
            <small class="text-muted float-end"></small>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-body">
            <form action="{{ route('orders.update', $orders->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col mb-3">
                        <label for="customers_id" class="form-label">Customers Name</label>
                        <select required id="customers_id" name="customers_id" autocomplete="off"
                            class="form-control">
                            <option value="">Choose Customers</option>
                            @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}"
                                {{ $customer->id === $orders->customers_id ? 'selected' : '' }}>
                                {{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="order_date" class="form-label">Order Date</label>
                        <input type="date" name="order_date" value="{{ $orders->order_date }}" min="2023-01-01"
                            max="2030-12-31" autocomplete="off" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="total_amount" class="form-label">Total Amount</label>
                        <input type="number" name="total_amount" value="{{ $orders->total_amount }}" step="0.01"
                            class="form-control" autocomplete="off" onkeypress="return hanyaAngka(event)">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">
                        Reset
                    </button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
@endsection
