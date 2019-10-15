@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Auth::user()->hasRole('admin'))
                    <div class="d-flex">
                        <div class="pr-5 "><a class="btn btn-primary" href="">Create Role</a></div>
                        <div class="pr-5 "><a class="btn btn-success" href="">Create Admin</a></div>
                    </div>
                @endif
                @if(Auth::user()->hasRole('admin'))
                    <div class="card">
                        <div class="card-header">Roles Table</div>

                        <div class="card-body">
                            <table class="table">
                                <thead class="table-primary">
                                <tr>
                                    <th scope="col">Admin Name</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Object Manger</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($adminRoles as $admin => $role)
                                    <tr>
                                        <td>{{ $admin }}</td>
                                        <td>{{ $role[0] }}</td>
                                        <td>{{ $role[1] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Shop-Computer</div>

                    <div class="card-body">
                        <table class="table">
                            <thead class="table-primary">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $value[0]->count() }} <small>{{ $value[1] }}</small></td>
                                    @if(! Auth::user()->hasRole('admin'))
                                        @if($key == \Illuminate\Support\Facades\Session::get('objManage'))
                                            <td><a href="{{ route("$value[1]s.index") }}"
                                                   class="btn btn-secondary">Detail</a></td>
                                        @endif
                                    @else
                                        <td><a href="{{ route("$value[1]s.index") }}"
                                               class="btn btn-secondary">Detail</a></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
