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
        <form class="row g-3">
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Current Password</label>
              <input type="password" name="password" class="form-control" id="inputNanme4">
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">New Password</label>
              <input type="password" class="form-control" id="inputEmail4">
            </div>
            <div class="col-12">
              <label for="inputPassword4" class="form-label">Confirm New Password</label>
              <input type="password" class="form-control" id="inputPassword4">
            </div>
            
          </form><!-- Vertical Form -->
      </form>

    </div>
  </div>
@endsection