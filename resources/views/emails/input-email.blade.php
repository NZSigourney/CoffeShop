{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        @if(session('message'))
        <div class="alert alert-success">
                {{ session('message') }}
        </div>
        @endif
        <form action="{{route('postEmail')}}" method="post">
        @csrf
        <div class="form-group">
    
        <label for="">Email của bạn</label>
        <input type="text" name="txtEmail" id="" class="form-control" placeholder="Nhập Email của bạn" aria-describedby="helpId" value="{{isset($request->txtEmail)?$request->txtEmail:''}}">
        
        <button type="submit" class="btn btn-primary">Reset Password</button>
        </div>
        </form>
    </div>
</body>
</html> --}}

@extends('layouts.master')
@section('content')
<div class="container">
    @if(session('message'))
    <div class="alert alert-success">
            {{ session('message') }}
    </div>
    @endif
    <form action="{{route('postEmail')}}" method="post">
    @csrf
    <div class="form-group">

    <label for="">Email của bạn</label>
    <input type="text" name="txtEmail" id="" class="form-control" placeholder="Nhập Email của bạn" aria-describedby="helpId" value="{{isset($request->txtEmail)?$request->txtEmail:''}}">
    
    <button type="submit" class="btn btn-primary">Reset Password</button>
    </div>
    </form>
</div>
@endsection