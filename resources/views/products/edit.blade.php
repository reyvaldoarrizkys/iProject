@extends('layouts-admin.master', ['title' => 'Products'])
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update Products</h5>
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
                <form action="{{ route('products.update', $products->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col mb-3">
                            <label for="gambar" class="form-label">Image</label>
                            <input type="file" name="gambar" value="{{ $products->gambar }}" placeholder="" 
                                autocomplete="off" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Name</label>
                            <input type="text" name="name" value="{{ $products->name }}" placeholder=""
                                autocomplete="off" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Price</label>
                            <input type="text" name="price" placeholder="" value="{{ $products->price }}"
                                autocomplete="off" class="form-control" onkeypress="return hanyaAngka(event)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Description</label>
                            <textarea name="description" autocomplete="off" id="" cols="10" rows="10" class="form-control">{{ $products->description }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">stock</label>
                            <input type="text" name="stock" value="{{ $products->stock }}" placeholder=""
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
              var charCode = (evt.which) ? evt.which : event.keyCode
              if (charCode > 31 && (charCode < 48 || charCode > 57))
        
                return false;
              return true;
            }
    </script>
@endsection
