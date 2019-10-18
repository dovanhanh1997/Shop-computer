@extends("layouts.admin")
@section("content")
    <div class="container">
        <span><h3>List Bill</h3></span>
        <hr/>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Pay Date</th>
                <th scope="col">Amount Product</th>
                <th scope="col">Total Bill</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($bills as $key => $bill)
                <tr>
                    <td>{{ 'CI-'.$bill->user->id }}</td>
                    <td>{{ $bill->user->name }}</td>
                    <td>{{ $bill->payDate }}</td>
                    <td>{{ $bill->products()->count() }}</td>
                    <td>{{ number_format($bill->billPrice).' VND' }}</td>
                    <td>
                        <div class="d-flex">
                            <div class="pr-2">
                                <a href="{{ route('bills.show',$bill->id) }}" class="btn btn-primary">Detail</a>
                            </div>
                            <div class="pr-2">
                                <form action="{{ route('bills.destroy',$bill->id) }}" method="post">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>

                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
