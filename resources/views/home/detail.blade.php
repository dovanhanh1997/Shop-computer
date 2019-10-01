@extends("layouts.home")
@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
                <div class=>
                    <img src="{{ asset('storage/'.$product->image) }}" alt="" width="500px">
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <strong><h2>{{ $product->productName }}</h2></strong>
                    </div>
                    <div class="card-body">
                        <h5><p>Price: {{ number_format($product->productPrice).' VND' }}</p>
                        </h5>
                        <from>
                            @csrf
                            <div class="pr-3"><a href="" class="btn btn-secondary">Add to Cart</a></div>
                            <br>
                            <div id="qtySelector" class="quantity-col1">
                                <p class="quantity-label">Số lượng:</p>
                                <button type="button" onclick="return decreaseQty()">-</button>
                                <span
                                    class="input-group mb-3"
                                    style="display: none;"></span>
                                <input id="qty" type="tel" name="qty" value="1"
                                       min="1" max="100">
                                <button type="button" onclick="return increaseQty()">+</button>
                            </div>
                        </from>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    input[type=tel] {
        width: 40px;
    }
</style>

<script>
    function increaseQty() {
        let qty = 0;
        let value = document.getElementById('qty').value;
        if (parseInt(value) >= 1 && parseInt(value) < 100) {
            qty = parseInt(value) + 1;
            return document.getElementById('qty').value = qty;
        }
    }

    function decreaseQty() {
        let qty = 0;
        let value = document.getElementById('qty').value;
        if (parseInt(value) > 1 && parseInt(value) < 100) {
            qty = parseInt(value) - 1;
            return document.getElementById('qty').value = qty;
        }
    }
</script>
