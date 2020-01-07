<form method="post" action="{{route('users.destroy', $user->id)}}">
<div class="modal-header justify-content-center">
    <div class="modal-profile">
        <i class="nc-icon nc-simple-remove"></i>
    </div>
</div>
<div class="modal-body text-center">
	  @csrf
      @method('DELETE')
   <p>Are you sure you wan't to delete {{$user->name}} account?</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">No</button>
    <button type="submit" class="btn btn-primary" >Yes</button>
</div>
</form>
