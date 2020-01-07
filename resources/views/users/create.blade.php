<form method="post" action="{{ route('users.store') }}">
    <div class="modal-header">
        <h5 class="modal-title">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body row">
        <!--Name-->
        <div class=" col-md-6">Name</div>
        @csrf
        <div class="col-md-6" style="padding: 10px;">
            <input type="text" name="name" class="form-control " required>
        </div>

        <!--Email-->
        <div class=" col-md-6">Email Address</div>
        <div class="col-md-6" style="padding: 10px;">
            <input type="email" name="email" class="form-control " required>
        </div>
        <!-- Role -->
        <div class=" col-md-6">Role</div>
        <div class="col-md-6" style="padding: 10px;">
            <select name="role_id" required class="form-control">
                @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->display_name}}</option>
                @endforeach
            </select>
        </div>
        <div class=" col-md-12 text-center">Password is set to (12345678)</div>
    </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" >Save</button>
    </div>
</form>
