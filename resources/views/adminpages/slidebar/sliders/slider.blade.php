@extends('adminpages.layouts.master')
@section('css')
    <link rel="stylesheet" href="/assets/css/adminpages/sliderbtn.css">
@endsection
@section('content')
<div class="container-fluid px-4" style="">
  <h1 class="mt-4">Danh Sách Slider</h1>
  {{-- <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="{{route('admin.getCateList')}}">Admin</a></li>
      <li class="breadcrumb-item active">Danh mục</li>
  </ol> --}}
  @if (Session::has('message'))
    <div class="alert alert-success">
      {{Session::get('message')}}
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
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sliders as $sld)
                <tr>
                  <th class="row">{{ $sld->id }}</th>
                  <td class="row"><img src="/images/sliders/{{$sld->image }}" alt="{{$sld->image }}" style="margin: 15px 0 15px; width: 150px; height: 150px; object-fit: cover;"></td>
                  <td class="row">
                    <a class="btn edit-button" href="{{ route('sliders.edit', $sld->id) }}" role="button">Edit</a>
                    <form action="{{ route('sliders.destroy', $sld->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <input type="submit" value="Delete" class="btn delete-button">
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