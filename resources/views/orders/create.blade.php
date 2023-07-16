<div class="modal fade" id="smallModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Leave Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <div class="modal-body">
                <form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col mb-3">
                            <label for="customers_id" class="form-label">Customers Name</label>
                            <select required id="customers_id" name="customers_id" autocomplete="off"
                                class="form-control">
                                <option value="">Choose Customers</option>
                                @foreach ($customers as $k)
                                    <option value="{{ $k->id }}">{{ $k->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="product_id" class="form-label">Products</label>
                            <select required id="product_id" name="product_id" autocomplete="off" class="form-control" onchange="updatePrice()">
                                <option value="">Choose Products</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" id="price" name="price" placeholder="Product Price" readonly autocomplete="off" class="form-control" oninput="calculateTotalAmount()">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" name="quantity" placeholder="Insert Quantity" class="form-control" oninput="calculateTotalAmount()"
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="total_amount" class="form-label">Total Amount</label>
                            <input type="text" name="total_amount" placeholder="Total Amount" class="form-control"
                            readonly autocomplete="off" onkeypress="return hanyaAngka(event)">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
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
   <script>
    function updatePrice() {
        var selectedProductId = document.getElementById("product_id").value;
        var priceInput = document.getElementById("price");
        
        // Cari produk yang sesuai dengan ID yang dipilih
        var selectedProduct = {!! $products !!}.find(function(product) {
            return product.id == selectedProductId;
        });

        // Perbarui nilai harga
        if (selectedProduct) {
            priceInput.value = selectedProduct.price;
        } else {
            priceInput.value = "";
        }
         // Hitung total harga
         calculateTotalAmount();
    }

    function calculateTotalAmount() {
        var price = document.getElementById("price").value;
        var quantity = document.getElementsByName("quantity")[0].value;
        var totalAmountInput = document.getElementsByName("total_amount")[0];

        var totalAmount = price * quantity;
        totalAmountInput.value = totalAmount.toFixed(2);
    }

    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
