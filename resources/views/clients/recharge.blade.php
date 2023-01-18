@extends('layout')

@section('content')

<div>
    <h3>Current Balance: {{ $wallet->balance }}</h3>
    <form action="{{ route('clients.recharge', $client) }}" method="POST">
        @csrf
        <label for="amount">Recharge Amount:</label>
        <input type="text" name="amount" id="amount">
        <button type="submit">Recharge</button>
    </form>
    <h4>Transaction History:</h4>
    <pre>{{ $wallet->transactions }}</pre>
</div>

@endsection