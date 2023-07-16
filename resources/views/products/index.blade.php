@extends('layouts-admin.master', ['title' => 'Products'])
@section('content')
    <div class="card">
        <div class="d-flex justify-content-end pt-2" style="padding-right: 25px">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallModal">
                <i class='bx bxs-plus-circle'></i> Add Products
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
                        <th>Gambar</th>
                        <th>Name Products</th>
                        <th>price</th>
                        <th>Description</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php $countData = count($products); ?>
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
                    @foreach ($products as $no => $value)
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('/storage/product/' . $value->gambar) }}" class="rounded"
                                        style="width: 150px">
                                </td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->price }}</td>
                                <td>{{ $value->description }}</td>
                                <td>{{ $value->stock }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $value->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('products.destroy', $value->id) }}" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                        </tbody>
                    @endforeach
                @endif
            </table>
            @php
                $pageNumber = $products->currentPage();
            @endphp
            @if ($products->onFirstPage())
                @php
                    $previousPageUrl = null;
                @endphp
            @else
                @php
                    $previousPageUrl = $products->previousPageUrl();
                @endphp
            @endif
            @if ($products->hasMorePages())
                @php
                    $nextPageUrl = $products->nextPageUrl();
                @endphp
            @else
                @php
                    $nextPageUrl = null;
                @endphp
            @endif
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item prev">
                        <a class="page-link" href="{{ $previousPageUrl }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="{{ $products->url($pageNumber) }}">{{ $pageNumber }}</a>
                    </li>
                    <li class="page-item next">
                        <a class="page-link" href="{{ $nextPageUrl }}"><i class="tf-icon bx bx-chevrons-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
        @include('products.create')
    </div>

@endsection
