@extends('adminpages.layouts.master')
@section('css')
    <link rel="stylesheet" href="/assets/product.css">
@endsection
@section('content')
<!-- hiện ra toàn bộ thông báo lỗi -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!------------------------------------------------------------------------------>
<form action="{{ route('products.update', $products->id) }}" method="POST" enctype="multipart/form-data" class="addproduct">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ isset($products) ? $products->name: '' }}" require="require">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" required="required">{{ isset($products) ? $products->description : '' }}</textarea>
    </div>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="image">Image</label>
        <img src="/images/products/{{$products->image}}" alt="{{$products->image}}" style="margin: 15px 0 15px; width: auto; height: 150px;">
        <input type="file" name="image" id="image" class="form-control" value="{{isset($products) ? $products->image: '' }}">
    </div>
    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<!------------------------------------------------------------------------------>
    {{-- <div class="form-group">
        <label for="category">unit</label>
        <input type="text" name="unit" id="unit" class="form-control" value="{{ isset($products)?$products->unit:'' }}" require="require">
    </div>
    @error('category')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror --}}
<!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="new_price">Price</label>
        <input type="text" name="unit_price" id="unit_price" class="form-control" value="{{ isset($products) ? $products->unit_price:'' }}" require="require">
    </div>
    @error('new_price')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="old_price">Promotion Price</label>
        <input type="text" name="promotion_price" id="promotion_price" class="form-control" value="{{ isset($products) ? $products->promotion_price:'' }}" require="require">
    </div>
    @error('old_price')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<!------------------------------------------------------------------------------>
<div class="form-group">
    <label for="popular">Popular</label>
    <input type="number" name="popular" id="popular" class="form-control" value="{{ isset($products) ? $products->popular:'' }}" require="require">
</div>
{{-- @error('old_price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror --}}
<!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="id_type">Danh Mục</label>
        <select name="id_type" id="id_type" class="form-control" require="require">
            <option value="1" @if(isset($products) && $products->id_type == 1) selected @endif>Cà Phê</option>
            <option value="2" @if(isset($products) && $products->id_type == 2) selected @endif>Giải Khát</option>
            <option value="3" @if(isset($products) && $products->id_type == 3) selected @endif>Nước Ngọt</option>
        </select>
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<!------------------------------------------------------------------------------>
    <button type="submit" class="btn btn-primary">edit</button>
</form>    
@endsection