@extends('adminpages.layouts.master')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Danh mục</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.getCateList')}}">Admin</a></li>
            <li class="breadcrumb-item active">Danh mục</li>
        </ol>
        @if (Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Danh sách Tài khoản
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <div class="container">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#ID</th>
                                    <th scope="col">Full_name</th>
                                    <th scope="col">Avatar</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row" style="text-content: center">{{ $user->id }}</th>
                                    <td scope="row">{{ $user->full_name}}</td>
                                    <td scope="row"><img src="/images/users/{{ $user->image }}" alt="{{ $user->image }}" style="margin: 15px 0 15px; width: 150px; height: 150px; object-fit: cover;"></td>
                                    <td scope="row">{{ $user->email }}</td>
                                    <td scope="row">{{ $user->phone }}</td>
                                    <td scope="row">{{ $user->address }}</td>
                                    {{-- <td scope="row">{{ $user->level }}</td> --}}
                                    <td scope="row">
                                        @switch($user->level)
                                            @case(1)
                                                Quản Trị Viên
                                            @break
                                            @case(2)
                                                Cộng Tác viên
                                            @break
                                            @case(3)
                                                Khách hàng
                                            @break
                                            @default
                                                N/A
                                        @endswitch
                                    </td>                                    
                                    <td><a class="btn btn-primary btn-sm " href="{{ route('users.edit', $user->id) }}" role="button">Edit</a></td>
                                    <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="xóa" class="btn btn-primary btn-sm">
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>                        
                </table>
            </div>
        </div>
    </div>
@endsection