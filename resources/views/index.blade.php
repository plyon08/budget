@extends('layouts.app')

@section('content')
    <h4>Index</h4>

    @foreach ($transactions as $t)
        {{ $t->transaction_date->format('F j') }}
        {{ $t->category }}
        {{ $t->dollar_amount }}
        <br/>
    @endforeach
@endsection