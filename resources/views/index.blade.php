@extends('layouts.app')

@section('content')
    <div class="row income-amount text-center">
        <div class="col">
            <h5>Income:</h5>
        </div>
        <div class="col">
            <h5>${{ $income }}</h5>
        </div>
    </div>
    <div class="row expense-amount text-center">
        <div class="col">
            <h5>Expense:</h5>
        </div>
        <div class="col">
            <h5>${{ $expense }}</h5>
        </div>
    </div>
    <div class="row @if ($balance <= 0) {{ 'negative-balance' }} @else {{ 'positive-balance' }} @endif text-center">
        <div class="col">
            <h5>Balance:</h5>
        </div>
        <div class="col">
            <h5>${{ $balance }}</h5>
        </div>
    </div>

    <div class="row mt-4" style='border-bottom:1px solid black;'>
        <div class="col">
            <h6>Date</h6>
        </div>
        <div class="col">
            <h6>Category</h6>
        </div>
        <div class="col text-right">
            <h6>Amount</h6>
        </div>
    </div>

    <div class="row">
        <div class="col">
        @foreach ($transactions as $t)
            <div class="row @unless ('Income' == $t->category) {{ 'expense-amount' }} @endunless">
                <div class="col">
                    {{ $t->transaction_date->toFormattedDateString() }}
                </div>
                <div class="col">
                    {{ $t->category }}
                </div>
                <div class="col text-right">
                    ${{ $t->dollar_amount }}
                </div>
            </div>        
        @endforeach
        </div>
    </div>
@endsection