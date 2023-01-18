@extends('layout')

@section('content')

<form method="POST" action="{{ route('clients.store') }}">
    @csrf
    <label for="player_id">Player ID</label>
    <input type="text" name="player_id" required>
    
    <label for="deposit_voucher">Deposit Voucher</label>
    <input type="text" name="deposit_voucher" required>

    <label for="bank">Bank</label>
    <input type="text" name="bank" required>

    <label for="channel">Communication Channel</label>
    <select name="channel" id="channel">
        <option value="whatsapp">WhatsApp</option>
        <option value="telegram">Telegram</option>
    </select>

    <button type="submit">Submit</button>
</form>

@endsection