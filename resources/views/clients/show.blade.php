@extends('layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show client</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clients.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Player_id:</strong>
                {{ $client->player_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Deposit Voucher:</strong>
                {{ $client->deposit_voucher }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bank:</strong>
                {{ $client->bank }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Channel:</strong>
                {{ $client->channel }}
            </div>
        </div>
    </div>

    <div>
        @if ($wallet)
            <h3>Current Balance: {{ $wallet->balance }}</h3>
        @else
            <p> No data found for the client</p>
        @endif
        
        <form action="{{ route('clients.recharge', $client) }}" method="POST">
            @csrf
            <label for="amount">Recharge Amount:</label>
            <input type="hidden" name="id"  value="{{ $client->id }}">
            <input type="text" name="amount" id="amount">
            <button type="submit">Recharge</button>
        </form>
        <h4>Transaction History:</h4>
        @if ($wallet)
            {{-- <pre>{{ $wallet->transactions }}</pre> --}}
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Transaction</th>
                        <th>Update Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (explode(PHP_EOL, $wallet->transactions) as $index => $transaction)
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $transaction }}</td>
                            <td>
                                <form action="{{ route('clients.updateTransaction', $client) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="transaction_id" value="{{ $index }}">
                                    <label for="amount">S/.:</label>
                                    <input type="text" name="amount">
                                    <button type="submit">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    
@endsection


