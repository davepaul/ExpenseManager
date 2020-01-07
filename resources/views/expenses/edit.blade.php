<form method="post" action="{{route('expenses.update', $data['expense']->id)}}">
    <div class="modal-header">
        <h5 class="modal-title">Edit Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body row">
        <!--Display Name-->
        <div class=" col-md-6">Expense Category</div>
        @csrf
         @method('PATCH')
        <div class="col-md-6" style="padding: 10px;">
            <select name="category_id" required class="form-control">
                @foreach($data['expenseCategory'] as $category)
                    @if($data['expense']->category_id === $category->id)
                        <option selected value="{{$category->id}}">{{$category->display_name}}</option>
                    @else
                        <option value="{{$category->id}}">{{$category->display_name}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <!--Description-->
        <div class=" col-md-6">Amount</div>
        <div class="col-md-6" style="padding: 10px;">
            <input type="number" name="amount" class="form-control " value="{{$data['expense']->amount}}" required>
        </div>

         <div class=" col-md-6">Entry Date</div>
        <div class="col-md-6" style="padding: 10px;">
            <input type="date" name="entry_date" class="form-control " value="{{date('Y-m-d', strtotime($data['expense']->entry_date))}}" required>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" >Save</button>
    </div>
</form>