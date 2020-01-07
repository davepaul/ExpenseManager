@extends('layouts.dashboard_layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-body">
				<div class=row>
            		<div class="col-md-6">
            			<h4 class="card-title">Expense Categories</h4>
	            	</div>
	                <div class="col-md-6 d-flex justify-content-end">
	            		<h4 class="card-title"><span class="text-primary">Expense Management</span> > Expense Categories</h4>
	            	</div>
            	</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <button class="btn btn-primary pull-right modaltoggle" data-href="expense-categories/create" type="button">Add Expense Category</button>
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
                        @foreach($expenseCategory as $category)
                            <tr>
                                <td class="text-center">{{$category->display_name}}</td>
                                <td class="text-center">{{$category->description}}</td>
                                <td class="text-center">{{date('Y-m-d', strtotime($category->created_at))}}</td>
                                <td class="text-center">
                                 <div class='dropdown'>
                                    <button class='btn btn-primary btn-outline dropdown-toggle' type='button' id='dropdownMenu1' data-toggle='dropdown'>
                                        Action <span class='caret'></span>
                                    </button>
                                    <ul class='dropdown-menu' role='menu' aria-labelledby='dropdownMenu1'>
                                        <a data-href='expense-categories/edit/{{$category->id}}' class='dropdown-item overflow-hidden modaltoggle' href='#'>Edit</a>
                                        <a data-href='expense-categories/show/{{$category->id}}' class='dropdown-item overflow-hidden modaltoggle' href='#'>Delete</a>
                                    </ul>
                                </div>
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
        $('#expanse-management').addClass('active');
        $('#expense-categories').addClass('active');
        $('#expanse-management-collapse').addClass('show');
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