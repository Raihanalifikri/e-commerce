<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="type" class="btn btn-primary">Save changes</button>
                        </div>
                     
                  </form>
                 
            </div>
            
        </div>
    </div>
</div><!-- End Basic Modal-->