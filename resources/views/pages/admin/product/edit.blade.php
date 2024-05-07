@extends('layouts.parent')
@section('title', 'Admin - Create Product')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Edit Product {{ $product->name }}</h5>

      <!-- Vertical Form -->
      <form action="{{ route('admin.product.update', $product->id) }}" method="post" class="row g-3" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="inputNanme4" name="name" value="{{ $product->name }}">
        </div>
        <div class="col-12">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select" name="category_id">
              <option selected>{{ $product->category->name }}</option>
              @foreach ($category as $row)
              <option value="{{ $row->id }}">{{ $row->name }}</option>
              @endforeach
            </select>
          </div>
        <div class="col-12">
          <label for="inputPassword4" class="form-label">Price</label>
          <input type="text" class="form-control" id="inputPassword4" name="price" value="{{ $product->price }}">
        </div>
        <div class="col-12">
            <label for="floatingTextarea" class="form-label">Address</label>
            <div class="form-floating">
              <textarea class="form-control" id="floatingTextarea" style="height: 100px;" name="description">{{ $product->description }}</textarea>
            </div>
          </div>
        <div class="text-end">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- Vertical Form -->

    </div>
  </div>
@endsection