<form method="post" action="{{route('users.update', $data['user']->id)}}">
    <div class="modal-header">
        <h5 class="modal-title">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body row">
        <!--Name-->
        <div class=" col-md-6">Name</div>
        @csrf
        @method('PATCH')
        <div class="col-md-6" style="padding: 10px;">
            <input type="text" name="name" class="form-control " value="{{$data['user']->name}}" required>
        </div>

        <!--Email-->
        <div class=" col-md-6">Email Address</div>
        <div class="col-md-6" style="padding: 10px;">
            <input type="email" name="email" class="form-control " value="{{$data['user']->email}}" readonly required>
        </div>
        <!-- Role -->
        <div class=" col-md-6">Role</div>
        <div class="col-md-6" style="padding: 10px;">
            <select name="role_id" required class="form-control">
                @foreach($data['roles'] as $role)
                  @if($data['user']->role_id === $role->id)
                       <option selected value="{{$role->id}}">{{$role->display_name}}</option>
                    @else
                        <option value="{{$role->id}}">{{$role->display_name}}</option>
                    @endif
                    
                @endforeach
            </select>
        </div>
    </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" >Save</button>
    </div>
</form>
