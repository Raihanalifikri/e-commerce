@extends('layouts.parent')
@section('title', 'Admin - Product')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Category</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active">Data Category</li>
                </ol>
            </nav>

            {{-- Button Modal Create Category --}}
            <!-- Basic Modal -->
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                <i class="bi bi-plus"></i>
                Add Category
            </a>

            <!-- End Basic Modal-->

            {{-- Table --}}
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- {{ dd($product) }} --}}
                    @forelse ($product as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->category->name }}</td>
                            <td>{{ $row->price }}</td>
                            <td>
                                <a href="{{ route('admin.product.gallery.index', $row->id) }}" class="btn btn-primary">
                                    <i class="bi bi-card-image"></i>
                                </a>
                                <a href="{{ route('admin.product.edit', $row->id) }}" class="btn btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.product.destroy', $row->id) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data Is Empty</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
