@extends('layouts.dashboard_layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-body">
				<div class=row>
            		<div class="col-md-6">
            			<h4 class="card-title">My Expenses</h4>
	            	</div>
	                <div class="col-md-6 d-flex justify-content-end">
	            		<h4 class="card-title">Dashboard</h4>
	            	</div>
            	</div>
			</div>
		</div>
	</div>
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body row">
            	<div class="col-md-6 d-flex justify-content-center">
            		<table>
            			<tr>
            				<th>Expense Categories</th>
            				<th>Total</th>
            			</tr>
                        @foreach($expenses as $expense)
                			<tr>
                				<td>{{$expense['category']}}</td>
                				<td>{{$expense['total']}}</td>
                			</tr>
                        @endforeach
            		</table>
            	</div>
            	<div class=col-md-6>
                	<div id=chartEmail class="ct-chart ct-perfect-fourth"></div>
            	</div>
            </div>
    	</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            method: "GET",
            url: "dashboard/show",
            data: null,
            success: function (strJSON) {
                var data = JSON.parse(strJSON);
                 Chartist.Pie('#chartEmail', {
                    labels: data.map(category => category.category, []),
                    series: data.map(category => category.total, [])
                });
            }
        });
        $('#dashboard').addClass('active');
    });
</script>
@endsection