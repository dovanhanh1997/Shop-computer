@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #cbd3da">
                    <div class="card-header">
                        Update Product
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update' ,$id) }}" method="post" enctype="multipart/form-data">
                            @method("put")
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">
                                    Name
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="productName" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">
                                    Price
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="productPrice" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Product Image</label>

                                <input type="file" class="" name="image">
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-success" type="submit">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
