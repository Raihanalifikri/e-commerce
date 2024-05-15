@extends('layouts.parent')
@section('title', 'Change Password')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Vertical Form</h5>

      <!-- Vertical Form -->
      <form action="{{ route('profile.updatePassword') }}" method="post">
        @csrf
        @method('PUT')
            <div class="col-12">
              <label for="inputPassword" class="form-label">Current Password</label>
              <input type="password" name="current_password" class="form-control" id="inputPassword">
            </div>
            <div class="col-12">
              <label for="inputPassword" class="form-label">New Password</label>
              <input type="password" name="password" class="form-control" id="inputPassword">
            </div>
            <div class="col-12">
              <label for="inputPassword" class="form-label">Confirm New Password</label>
              <input type="password" name="confirm_password" class="form-control" id="inputPassword">
            </div>
            <div class="d-flex justify-content-end my-3">
              <button class="btn btn-primary" type="submit">
                  Change Password
              </button>
              <a href="{{ route('admin.dashboard') }}" class="btn btn-success mx-3">
                <i class="bi bi-arrow-left"></i> Back
                </a>
          </div>
         
      </form>
     

    </div>
  </div>
@endsection