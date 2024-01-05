@extends('adminpages.layouts.master')
@section('css')
    <link rel="stylesheet" href="/assets/product.css">
@endsection
@section('content')
<main>
    <!-- hiện ra toàn bộ thông báo lỗi -->
    <header>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </header>
    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data" class="addproduct">
        @csrf
    <!------------------------------------------------------------------------------>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    <!------------------------------------------------------------------------------>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</main>
@endsection