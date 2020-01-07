<?php

namespace App\Http\Controllers;

use App\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
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
        $expenseCategory = ExpenseCategory::all();
        return view('expenseCategories.index', compact('expenseCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenseCategories.create');
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
         'display_name' => 'required|max:255',
         'description' => 'required|max:255',
        ]);

        $expenseCategory = ExpenseCategory::create($validatedData);
        return redirect('/expense-categories')->with('success', 'expense category successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expenseCategory = ExpenseCategory::findOrFail($id);
        return view('expenseCategories.delete', compact('expenseCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expenseCategory = ExpenseCategory::findOrFail($id);
        return view('expenseCategories.edit', compact('expenseCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
         'display_name' => 'required|max:255',
         'description' => 'required|max:255',
        ]);

        $expenseCategory = ExpenseCategory::whereId($id)->update($validatedData);
        return redirect('/expense-categories')->with('success', 'expense category successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expenseCategory = ExpenseCategory::findOrFail($id);
        $expenseCategory->delete();
        return redirect('/expense-categories')->with('success', 'expense category successfully deleted');
    }
}
