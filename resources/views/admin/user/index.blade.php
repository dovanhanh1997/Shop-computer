@extends("layouts.admin")
@section("content")
    <div class="container">
        <span>        <h3>List User</h3></span>
        <span><a class="btn btn-primary" href="{{ route('users.create') }}">Add User</a></span>
        <hr/>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $key => $user)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="d-flex">
                            <div class="pr-2">
                                <a href="{{ route('users.show',$user->id) }}" class="btn btn-primary">Info</a>
                            </div>
                            <div class="pr-2">
                                <form action="{{ route('users.destroy',$user->id) }}" method="post">
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
