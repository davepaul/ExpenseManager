<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       $expenses = DB::table('expenses')
                  ->join('expense_categories', 'expenses.category_id', '=', 'expense_categories.id')
                  ->select('expenses.*', 'expense_categories.display_name')
                  ->where('expenses.user_id', Auth::user()->id)
                  ->get();

        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expenseCategory = ExpenseCategory::all();

        return view('expenses.create', compact('expenseCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
         'category_id' => 'required',
         'amount'      => 'required|max:255',
         'entry_date'  => 'required',
         'user_id'     => 'required',
        ]);

        $expense = Expense::create($validatedData);
        return redirect('/expenses')->with('success', 'expense successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $expense = DB::table('expenses')
                  ->join('expense_categories', 'expenses.category_id', '=', 'expense_categories.id')
                  ->select('expenses.id', 'expense_categories.display_name')
                  ->where('expenses.id', $id)
                  ->first();
        return view("expenses.delete", compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['expenseCategory'] = ExpenseCategory::all();
        $data['expense']         = Expense::findOrFail($id);

        return view('expenses.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
         'category_id' => 'required',
         'amount'      => 'required|max:255',
         'entry_date'  => 'required',
        ]);

        $expense = Expense::whereId($id)->update($validatedData);
        return redirect('/expenses')->with('success', 'expense successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect('/expenses')->with('success', 'expense successfully deleted');
    }
}
