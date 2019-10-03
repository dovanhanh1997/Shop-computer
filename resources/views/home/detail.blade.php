@extends("layouts.home")
@section("home")
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
                        <form action="{{ route('changeCart', $product->id) }}" method="post">
                            @csrf
                            <br>
                                <div class="pr-3">
                                    <button type="submit" class="btn btn-success">Add to Cart</button>
                                </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>

</script>
