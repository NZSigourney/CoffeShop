@extends('adminpages.layouts.master')
@section('content')
<div class="container-fluid px-4" style="">
    <h1 class="mt-4">Danh Sách Sản phẩm</h1>
    {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin.getCateList')}}">Admin</a></li>
        <li class="breadcrumb-item active">Danh mục</li>
    </ol> --}}
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    <div class="card mb-4">
        {{-- <div class="card-header">
          <i class="fas fa-table me-1"></i>
          <H5>Danh sách Sản phẩm</H5>
        </div> --}}
        <div class="card-body">
          <table id="datatablesSimple">
            <div class="container">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Type ID</th>
                    <th scope="col">Description</th>
                    <th scope="col">Unit_price</th>
                    <th scope="col">Promotion_price</th>
                    <th scope="col">Popular (True or False)</th>
                    {{-- <th scope="col">Unit</th> --}}
                    @if(Auth::user()->level == 1)
                    <th scope="col">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                  <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    {{-- <td>{{ $product->image }}</td> --}}
                    <td><img src="/assets/images/products/{{$product->image }}" alt="{{$product->image }}" style="margin: 15px 0 15px; width: 150px; height: 150px; object-fit: cover;"></td>
                    {{-- <td>{{ $product->id_type }}</td> --}}
                    <td scope="row">
                      @switch($product->id_type)
                          @case(1)
                              Cà Phê
                          @break
                          @case(2)
                              Giải Khát
                          @break
                          @case(3)
                              Nước Ngọt
                          @break
                          @default
                              N/A
                      @endswitch
                    </td>            
                    <td scope="row">{{ $product->description }}</td>
                    <td scope="row">{{ $product->unit_price }}</td>
                    <td scope="row">{{ $product->promotion_price }}</td>
                    <td scope="row">
                      @switch($product->popular)
                        @case(1)
                          True
                        @break
                        @default
                        False
                      @endswitch
                    </td>
                    {{-- <td><label class="add-fav">
                      <input type="checkbox" />
                      <a href="{{route('')}}"></a>
                      <i class="icon-heart">
                        <i class="icon-plus-sign"></i>
                      </i>
                    </label></td> --}}
                    {{-- <td>{{ $product->unit }}</td> --}}
                    <td><a class="btn btn-primary btn-sm " href="{{ route('products.edit', $product->id) }}" role="button">Edit</a></td>
                    @if(Auth::user()->level == 1)
                    <td>
                      <form action="{{ route('products.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="xóa" class="btn btn-primary btn-sm">
                      </form>
                    </td>
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