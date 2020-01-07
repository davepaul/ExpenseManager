@extends('layouts.dashboard_layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-body">
				<div class=row>
            		<div class="col-md-6">
            			<h4 class="card-title">Users</h4>
	            	</div>
	                <div class="col-md-6 d-flex justify-content-end">
	            		<h4 class="card-title"><span class="text-primary">User Management</span> > Users</h4>
	            	</div>
            	</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <button class="btn btn-primary pull-right modaltoggle" data-href="users/create" type="button">Add User</button>
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email Address</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Created at</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{$user->name}}</td>
                            <td class="text-center">{{$user->email}}</td>
                            <td class="text-center">{{$user->display_name}}</td>
                            <td class="text-center">{{date('Y-m-d', strtotime($user->created_at))}}</td>
                            <td class="text-center">
                                @if($user->role_id !== 1)
                                    <div class='dropdown'>
                                        <button class='btn btn-primary btn-outline dropdown-toggle' type='button' id='dropdownMenu1' data-toggle='dropdown'>
                                            Action <span class='caret'></span>
                                        </button>
                                        <ul class='dropdown-menu' role='menu' aria-labelledby='dropdownMenu1'>
                                          <a data-href='users/edit/{{$user->id}}' class='dropdown-item overflow-hidden modaltoggle' href='#'>Edit</a>
                                          <a data-href='users/show/{{$user->id}}' class='dropdown-item overflow-hidden modaltoggle' href='#'>Delete</a>
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
        $('#users').addClass('active');
        $('#user-management-collapse').addClass('show');
    });
</script>
@endsection