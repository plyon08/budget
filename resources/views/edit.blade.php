@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">

            @include('includes.error')

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form class='mb-3' method="POST" action="{{ route('update',$transaction->id) }}">
                @method('PATCH')
                @csrf
                <div class="input-group py-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Date:</span>
                    </div>
                    <input id="transaction_date" type="date" class="form-control" name="transaction_date" value="{{ $transaction->transaction_date->toDateString() }}" required>
                </div>
                <div class="input-group py-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Amount:</span>
                    </div>
                    <input id="dollar_amount" type="number" class="form-control" name="dollar_amount" placeholder="0.00" step="0.01" value="{{ $transaction->dollar_amount }}" required>
                </div>
                <div class="input-group btn-group-vertical btn-group-toggle py-3" data-toggle="buttons">
                    <label class="btn btn-outline-info @if ('Income' === $transaction->category) active @endif">
                        <input type="radio" class="form-check-input" name="category" value="Income" @if ('Income' === $transaction->category) checked @endif> Income
                    </label>
                    <label class="btn btn-outline-info @if ('Entertainment' === $transaction->category) active @endif">
                        <input type="radio" class="form-check-input" name="category" value="Entertainment" @if ('Entertainment' === $transaction->category) checked @endif> Entertainment
                    </label>
                    <label class="btn btn-outline-info @if ('Gas' === $transaction->category) active @endif">
                        <input type="radio" class="form-check-input" name="category" value="Gas" @if ('Gas' === $transaction->category) checked @endif> Gas
                    </label>
                    <label class="btn btn-outline-info @if ('Shopping' === $transaction->category) active @endif">
                        <input type="radio" class="form-check-input" name="category" value="Shopping" @if ('Shopping' === $transaction->category) checked @endif> Shopping
                    </label>
                    <label class="btn btn-outline-info @if ('Groceries' === $transaction->category) active @endif">
                        <input type="radio" class="form-check-input" name="category" value="Groceries" @if ('Groceries' === $transaction->category) checked @endif> Groceries
                    </label>
                    <label class="btn btn-outline-info @if ('Eating Out' === $transaction->category) active @endif">
                        <input type="radio" class="form-check-input" name="category" value="Eating Out" @if ('Eating Out' === $transaction->category) checked @endif> Eating Out
                    </label>
                    <label class="btn btn-outline-info @if ('Rent' === $transaction->category) active @endif">
                        <input type="radio" class="form-check-input" name="category" value="Rent" @if ('Rent' === $transaction->category) checked @endif> Rent
                    </label>
                    <label class="btn btn-outline-info @if ('Phone' === $transaction->category) active @endif">
                        <input type="radio" class="form-check-input" name="category" value="Phone" @if ('Phone' === $transaction->category) checked @endif> Phone
                    </label>
                    <label class="btn btn-outline-info @if ('Internet' === $transaction->category) active @endif">
                        <input type="radio" class="form-check-input" name="category" value="Internet" @if ('Internet' === $transaction->category) checked @endif> Internet
                    </label>
                    <label class="btn btn-outline-info @if ('Electric' === $transaction->category) active @endif">
                        <input type="radio" class="form-check-input" name="category" value="Electric" @if ('Electric' === $transaction->category) checked @endif> Electric
                    </label>
                    <label class="btn btn-outline-info @if ('Car Insurance' === $transaction->category) active @endif">
                        <input type="radio" class="form-check-input" name="category" value="Car Insurance" @if ('Car Insurance' === $transaction->category) checked @endif> Car Insurance
                    </label>
                    <label class="btn btn-outline-info @if ('Health Insurance' === $transaction->category) active @endif">
                        <input type="radio" class="form-check-input" name="category" value="Health Insurance" @if ('Health Insurance' === $transaction->category) checked @endif> Health Insurance
                    </label>
                    <label class="btn btn-outline-info @if ('Car' === $transaction->category) active @endif">
                        <input type="radio" class="form-check-input" name="category" value="Car" @if ('Car' === $transaction->category) checked @endif> Car
                    </label>
                </div>
                <div class='row justify-content-md-start mb-3'>
                    <div class='col col-md-2 col-lg-1'>
                        <div class='text-center'>
                            <button type="submit" class="btn btn-outline-success">Submit</button>
                        </div>
                    </div>
                    <div class='col col-md-2 col-lg-1'>
                        <div class='text-center'>
                            <a class='btn btn-outline-warning' href='{{ url()->previous() }}'>Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection