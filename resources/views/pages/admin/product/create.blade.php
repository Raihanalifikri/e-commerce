@extends('layouts.parent')
@section('title', 'Admin - Create Product')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Product</h5>

            <!-- Vertical Form -->
            <form action="{{ route('admin.product.store') }}" method="post" class="row g-3">
                @csrf
                @method('POST')
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="inputNanme4" name="name">
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Category</label>
                    <select id="inputState" class="form-select" name="category_id">
                        <option selected>==== Chosee Category ====</option>
                        @foreach ($category as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Price</label>
                    <input type="text" class="form-control" id="inputPassword4" name="price">
                </div>
                <div class="col-12">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
                    <div class="col">
                        <textarea class="form-control border border-3" style="height: 100px" name="description"></textarea>
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
