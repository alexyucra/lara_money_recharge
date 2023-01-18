@extends('layout')

@section('content')

<div>
    <h4>Transaction History:</h4>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Transaction</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach (explode(PHP_EOL, $client->transactions) as $index => $transaction)
                <tr>
                    <td>{{ $index }}</td>
                    <td>{{ $transaction }}</td>
                    <td>
                        <form action="{{ route('clients.updateTransaction', $client) }}" method="POST">
                            @csrf
                            <input type="hidden" name="transaction_id" value="{{ $index }}">
                            <label for="amount">Update Amount:</label>
                            <input type="text" name="amount" id="amount">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection