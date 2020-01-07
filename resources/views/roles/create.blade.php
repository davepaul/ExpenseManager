<form method="post" action="{{ route('roles.store') }}">
    <div class="modal-header">
        <h5 class="modal-title">Add Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body row">
        <!--Display Name-->
        <div class=" col-md-6">Display Name</div>
        @csrf
        <div class="col-md-6" style="padding: 10px;">
            <input type="text" name="display_name" class="form-control " required>
        </div>

        <!--Description-->
        <div class=" col-md-6">Description</div>
        <div class="col-md-6" style="padding: 10px;">
            <input type="text" name="description" class="form-control " required>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" >Save</button>
    </div>
</form>

