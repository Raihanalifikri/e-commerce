@extends('layouts.parent')
@section('title', 'My Transaction')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">My Transaction</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active">Data Category</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                    <i class="bi bi-cash-stack"></i> List Transaction
            </div>  
            
            <table class="table datatable table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name Account</th>
                        <th>Rechiver Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Total price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @forelse ($myTransaction as $row)
                   <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ auth()->user()-name }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>{{ $row->total }}</td>
                    <td>show</td>
                </tr>
                   @empty
                       <tr>
                        <td class="text-center" colspan="7"">Transaction Not Found</td>
                       </tr>
                   @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
