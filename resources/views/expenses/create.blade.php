<form method="post" action="{{ route('expenses.store') }}">
    <div class="modal-header">
        <h5 class="modal-title">Add Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body row">
        <!--Display Name-->
        <div class=" col-md-6">Expense Category</div>
        @csrf
        <div class="col-md-6" style="padding: 10px;">
            <select name="category_id" required class="form-control">
                @foreach($expenseCategory as $category)
                    <option value="{{$category->id}}">{{$category->display_name}}</option>
                @endforeach
            </select>
        </div>

        <!--Description-->
        <div class=" col-md-6">Amount</div>
        <div class="col-md-6" style="padding: 10px;">
            <input type="number" name="amount" class="form-control " required>
        </div>

         <div class=" col-md-6">Entry Date</div>
        <div class="col-md-6" style="padding: 10px;">
            <input type="date" name="entry_date" class="form-control " required>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" >Save</button>
    </div>
</form>