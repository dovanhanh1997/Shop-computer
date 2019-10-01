@extends("layouts.home")
@section('content')
    <section class="text-center mb-4">

        <!--Grid row-->
        <div class="row wow fadeIn" style="visibility: visible; animation-name: fadeIn;">

        @foreach($products as $product)
            <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4">

                    <!--Card-->
                    <div class="card" style="background-color: #c8cbcf">

                        <!--Card image-->
                        <div class="view overlay">
                            <a href="{{ route('detail',$product->id) }}"> <img src="{{ asset('storage/'.$product->image) }}" alt="" width="200px"
                                             height="200px">
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body text-center">
                            <!--Category & Title-->
                            <a href="" class="grey-text">
                                <h5>Cart</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="" class="dark-grey-text">{{ $product->productName }}</a>
                                </strong>
                            </h5>

                            <h4 class="font-weight-bold blue-text">
                                <strong>{{ number_format($product->productPrice).' VND' }}</strong>
                            </h4>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>
                <!--Grid column-->
        @endforeach
        <!--Pagination-->
            <nav class="d-flex justify-content-center wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <ul class="pagination pg-blue">

                    <!--Arrow left-->
                    <li class="page-item disabled">
                        <a class="page-link waves-effect waves-effect" href="#" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>

                    <li class="page-item active">
                        <a class="page-link waves-effect waves-effect" href="#">1
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
@endsection
