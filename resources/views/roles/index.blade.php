@extends('layouts.dashboard_layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-body">
				<div class=row>
            		<div class="col-md-6">
            			<h4 class="card-title">Roles</h4>
	            	</div>
	                <div class="col-md-6 d-flex justify-content-end">
	            		<h4 class="card-title"><span class="text-primary">User Management</span> > Roles</h4>
	            	</div>
            	</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <button class="btn btn-primary pull-right modaltoggle" data-href="roles/create" type="button">Add Role</button>
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th class="text-center">Display Name</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Created at</th>
                        <th class="text-center">Action</th>

                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td class="text-center">{{$role->display_name}}</td>
                                <td class="text-center">{{$role->description}}</td>
                                <td class="text-center">{{date('Y-m-d', strtotime($role->created_at))}}</td>
                                <td class="text-center">
                                    @if($role->display_name !== "Administrator" && $role->display_name !== "User")
                                        <div class='dropdown'>
                                            <button class='btn btn-primary btn-outline dropdown-toggle' type='button' id='dropdownMenu1' data-toggle='dropdown'>
                                                Action <span class='caret'></span>
                                            </button>
                                            <ul class='dropdown-menu' role='menu' aria-labelledby='dropdownMenu1'>
                                                <a data-href='roles/edit/{{$role->id}}' class='dropdown-item overflow-hidden modaltoggle' href='#'>Edit</a>
                                                <a data-href='roles/show/{{$role->id}}' class='dropdown-item overflow-hidden modaltoggle' href='#'>Delete</a>
                                            </ul>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
        $(document).ready(function() {
        $('#user-management').addClass('active');
        $('#roles').addClass('active');
        $('#user-management-collapse').addClass('show');
    });
</script>
<script type="text/javascript">
    if("{{session()->get('success')}}"){
        $.notify({
            icon: 'fa fa-check',
            message: "{{session()->get('success')}}"

        },{
            type: "primary",
            timer: 2000,
            z_index: 1051,
        });
    }
                          
</script>
@endsection