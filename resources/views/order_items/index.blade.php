@extends('layouts-admin.master', ['title' => 'Orders Items'])
@section('content')
    <div class="card">
        <div class="d-flex justify-content-end pt-2" style="padding-right: 25px">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallModal">
                <i class='bx bxs-plus-circle'></i> Add Order Items
            </button>
        </div>
        <div class="d-flex justify-content-end pt-2">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <br>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead style="">
                    <tr style="color: #f1faee;">
                        <th>No</th>
                        <th>Order ID</th>
                        <th>Products</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php $countData = count($order_items); ?>
                @if ($countData < 1)
                    <tbody class="table-border-bottom">
                        <tr>
                            <td colspan="11" height="200px">
                                <h4 align="center">
                                    Data Not Found
                                </h4>
                            </td>
                        </tr>
                    </tbody>
                @else
                    @foreach ($order_items as $no => $value)
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $value->order_id }}</td>
                                <td>{{ $value->product_id }}</td>
                                <td>{{ $value->quantity }}</td>
                                <td>
                                    <a href="{{ route('order_items.edit', $value->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('order_items.destroy', $value->id) }}" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                        </tbody>
                    @endforeach
                @endif
            </table>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                  <li class="page-item prev">
                    <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="javascript:void(0);">1</a>
                  </li>
                  <li class="page-item next">
                    <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
                  </li>
                </ul>
              </nav>
        </div>
        
        @include('order_items.create')
    </div>
@endsection
