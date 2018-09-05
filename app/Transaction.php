<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaction extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['transaction_date'];

    protected $fillable = ['transaction_date', 'dollar_amount', 'category', 'notes'];
    

    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeMonth($query, $month)
    {
        $query->where('transaction_date', 'like', "%-$month-%");
    }

    public function scopeYear($query, $year)
    {
        return $query->where('transaction_date', 'like', "$year%");
    }
}
