<?php

namespace App\Http\Controllers;
use App\Expense;
use App\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $expenses = $this->getUserExpense(false);
        return view('dashboard.index', compact('expenses'));
    }

    public function show($isIndex = false)
    {   
        return $this->getUserExpense();
    }

    public function getUserExpense($isJson = true)
    {
        $category = ExpenseCategory::all();
        $expenses = [];
        foreach ($category as $key => $value) {
            $totalExpenses = DB::table('expenses')
                                ->where('expenses.category_id', $value->id)
                                ->where('expenses.user_id', Auth::user()->id)
                                ->sum('amount');
            $expenses[$key]['category'] = $value->display_name;
            $expenses[$key]['total']    = $totalExpenses;

        }
        return $isJson ?  json_encode($expenses) : $expenses;
    }
}
