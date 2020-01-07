<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['category_id', 'amount', 'entry_date', 'user_id'];
}
