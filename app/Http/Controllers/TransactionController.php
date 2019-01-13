<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = null;
        $month = null;
        $year = null;
        $balance = 0.00;
        $income = 0.00;
        $expense = 0.00;
        $savings = 0.00;
        $savings_deposit = 0.00;
        $savings_withdrawal = 0.00;
        $total_savings = 0.00;
        $query = Transaction::orderBy('transaction_date', 'desc');

        if (!empty($request->input('category'))) {
            $category = $request->input('category');
            $query->category($category);
        }
        if (!empty($request->input('month'))) {
            $month = $request->input('month');
            $query->month($month);
        }
        if (!empty($request->input('year'))) {
            $year = $request->input('year');
            $query->year($year);
        }
        
        $transactions = $query->get();

        foreach ($transactions as $t) {
            if ('Income' == $t->category || 'Interest' == $t->category || 'Cashback' == $t->category) {
                $income += $t->dollar_amount;
            } elseif ('Savings' == $t->category) {
                $savings += $t->dollar_amount;
            } elseif ('Savings-Deposit' == $t->category || 'Savings-Interest' == $t->category || 'Savings-Cashback' == $t->category) {
                $savings_deposit += $t->dollar_amount;
            } elseif ('Savings-Withdrawal' == $t->category) {
                $savings_withdrawal += $t->dollar_amount;
            } else {
                $expense += $t->dollar_amount;
            }
        }

        $balance = $income - $expense - $savings + $savings_withdrawal;

        $total_savings = $savings + $savings_deposit - $savings_withdrawal;

        $income = number_format($income, 2);
        $expense = number_format($expense, 2);
        $balance = number_format($balance, 2);
        $total_savings = number_format($total_savings, 2);

        return view('index', compact('transactions', 'income', 'expense', 'balance', 'total_savings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'transaction_date' => 'required|date',
            'dollar_amount' => 'required|numeric',
            'category' => 'required'
        ]);

        $transaction = new Transaction;

        $transaction->transaction_date = request('transaction_date');
        $transaction->dollar_amount = request('dollar_amount');
        $transaction->category = request('category');
        $transaction->notes = request('notes');

        if ($transaction->category == 'Savings-Cashback') {
            $transaction->dollar_amount *= 1.10;
        }

        $transaction->save();

        session()->flash('message', 'Transaction Saved Successfully!');

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $this->validate(request(), [
            'transaction_date' => 'required|date',
            'dollar_amount' => 'required|numeric',
            'category' => 'required'
        ]);

        $transaction = Transaction::find($transaction->id);

        $transaction->transaction_date = request('transaction_date');
        $transaction->dollar_amount = request('dollar_amount');
        $transaction->category = request('category');
        $transaction->notes = request('notes');
        
        $transaction->save();

        session()->flash('message', 'Transaction Updated Successfully!');

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $tansaction = Transaction::find($transaction->id);

        $transaction->delete();

        session()->flash('message', 'Transaction Deleted Successfully!');

        return redirect()->route('index');
    }
}
