@extends("layouts.admin")
@section("content")
    <div class="container">
        <h3>List User</h3> <br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $key => $customer)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $customer->customerName }}</td>
                    <td>{{ $customer->customerPhone }}</td>
                    <td>
                        <div class="d-flex">
                            <div class="pr-2">
                                <a href="{{ route('customers.show',$customer->id) }}" class="btn btn-primary">Info</a>
                            </div>
                            <div class="pr-2">
                                <form action="{{ route('customers.destroy',$customer->id) }}" method="post">
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
