<form method="post" action="{{route('roles.update', $roles->id)}}">
    <div class="modal-header">
        <h5 class="modal-title">Edit Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body row">
        <!--Display Name-->
        <div class=" col-md-6">Display Name</div>
        @csrf
        @method('PATCH')
        <div class="col-md-6" style="padding: 10px;">
            <input type="text" name="display_name" class="form-control " value="{{$roles->display_name}}" required>
        </div>

        <!--Description-->
        <div class=" col-md-6">Description</div>
        <div class="col-md-6" style="padding: 10px;">
            <input type="text" name="description" class="form-control " value="{{$roles->description}}" required>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" >Save</button>
    </div>
</form>