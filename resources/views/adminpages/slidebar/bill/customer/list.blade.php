@extends('adminpages.layouts.master')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Đơn đặt hàng</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.getCateList')}}">Admin</a></li>
            <li class="breadcrumb-item active">Order</li>
        </ol>
        @if (Session::has('success'))
        <div class="alert alert-success">
            <script>
                alert('{{ Session::get('success') }}')
            </script>
        </div>
        @endif
        <div class="card mb-4">
            {{-- <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Danh sách Khách hàng
            </div> --}}
            <div class="card-body">
                <table id="datatablesSimple">
                    <div class="container">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Họ Tên Đầy Đủ</th>
                                    <th scope="col">Giới tính</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Số Điện Thoại</th>
                                    <th scope="col">Địa Chỉ</th>
                                    <th scope="col">Ghi chú</th>
                                    @if(Auth::user()->level == 1)
                                    {{-- <th scope="col">Action</th> --}}
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customer as $cus)
                                <tr>
                                    <th scope="row" style="text-content: center">{{ $cus->id }}</th>
                                    <td scope="row">{{ $cus->name}}</td>
                                    <td scope="row">{{ $cus->gender }}</td>
                                    <td scope="row">{{ $cus->email }}</td>
                                    <td scope="row">{{ $cus->phone_number }}</td>
                                    <td scope="row">{{ $cus->address }}</td>
                                    {{-- <td scope="row">{{ $cus->level }}</td> --}}
                                    <td scope="row">{{ $cus->note}}</td>
                                    @if(Auth::user()->level == 1)
                                    @endif
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