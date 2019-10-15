@extends("layouts.home")
@section("home")


    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="{{ asset('storage/'.$product->image) }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">{{ $product->productName }}</h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">41 {{ __('user_home.reviews') }}</span>
                        </div>
                        <p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium
                            cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
                        <h4 class="price">{{ __('user_home.currentPrice') }}: <span>{{ number_format($product->productPrice) }}</span> VND</h4>
                        <p class="vote"><strong>91%</strong> {{__('user_home.detailComment')}} <strong>(87 {{__('user_home.votes')}})</strong>
                        </p>
                        <div class="action">
                            <div class="d-flex">
                                <form method="post" action="{{ route('changeCart', $product->id) }}">
                                    @csrf
                                    <button class="add-to-cart btn btn-default" type="submit">{{ __('user_home.addToCart') }}</button>
                                </form>
                                <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span>
                                </button>
                            </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

