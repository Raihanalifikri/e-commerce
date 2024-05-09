@extends('layouts.parent')
@section('title', 'List User')
@section('content')
    <div class="section dashboard">
        <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Customers <span> <span class="badge bg-success text-white"><i
                                    class="bi bi-check-circle me-1"></i> | {{ Auth::user()->role }}</span></span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $user }}</h6>
                            <span class="text-danger small pt-1 fw-bold">Telah Terdaftar :{{ $user }} pengguna</span>           
                          </div>
                    </div>

                </div>
            </div>

        </div><!-- End Customers Card -->
    </div>

    <div class="card">
        <div class="card-body">
            <h1 class="card-title">User List</h1>
            <!-- Table with hoverable rows -->

            <table class=" table-hover mt-4 table">
                <thead class="table-info">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-white">
                    @forelse ($users as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>
                            <button class="btn btn-primary">
                                <i class="bi bi-nut-fill"></i> Change Password
                            </button>
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>
    <!-- End Table with hoverable rows -->
@endsection
