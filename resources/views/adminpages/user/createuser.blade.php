@extends('adminpages.layouts.master')
@section('css')
    <link rel="stylesheet" href="/assets/product.css">
@endsection
@section('content')
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
<main>
<!------------------------------------------------------------------------------>
<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="addproduct">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="full_name" id="name" class="form-control" required>
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control" required>
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control" required>
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <!------------------------------------------------------------------------------>
    <div class="form-group">
        <label for="level">Level</label>
        <select name="level" id="level" class="form-control" required>
            <option value="1" @if(isset($users) && $users->level == 1) @endif>Quản trị Viên</option>
            <option value="2" @if(isset($users) && $users->level == 2) @endif>Cộng Tác Viên</option>
            <option value="3" @if(isset($users) && $users->level == 3) selected @endif>User</option>
        </select>
    </div>
    
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <!------------------------------------------------------------------------------>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
</main>
@endsection