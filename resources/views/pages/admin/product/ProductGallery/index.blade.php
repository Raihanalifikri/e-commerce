@extends('layouts.parent')
@section('title', 'Product Gallery')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Product Gallery >> {{ $product->name }}</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Product</a></li>
                    <li class="breadcrumb-item active">Data Category</li>
                </ol>
            </nav>

            <!-- Basic Modal -->
           

            <div class="col-md-12">
                <a href="{{ route('admin.product.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i>
                </a>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    <i class="bi bi-plus"></i> Product Gallery
                </button>
                @include('pages.admin.product.ProductGallery.modal-craete')
            </div>



            <!-- End Basic Modal-->

            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($product->product_galleries as $row)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>
                        <img src="{{ url('storage/product/gallery', $row->image) }}" alt="" width="100">
                      </td>
                      <td>
                        <form action="{{ route('admin.product.gallery.destroy', [$product->id, $row->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                      </td>
                    </tr> 
                    @empty
                        <td colspan="3" class="text-center">Data Not Fond Or Empty</td>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
