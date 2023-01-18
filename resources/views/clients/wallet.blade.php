@extends('layout')

@section('content')

<div>
    @if ($wallet)
        <h3>Current Balance: {{ $wallet->balance }}</h3>
    @else
        <p> No data found for the client</p>
    @endif
    
    <form action="{{ route('clients.recharge', $client) }}" method="POST">
        @csrf
        <label for="amount">Recharge Amount:</label>
        <input type="hidden" name="id"  value="{{ $client }}">
        <input type="text" name="amount" id="amount">
        <button type="submit">Recharge</button>
    </form>
    <h4>Transaction History:</h4>
    @if ($wallet)
        <pre>{{ $wallet->transactions }}</pre>
    @endif
</div>

@endsection