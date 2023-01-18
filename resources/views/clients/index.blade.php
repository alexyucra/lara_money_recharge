@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>lista de clientes</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('clients.create') }}"> [ Adicionar novo Cliente ] </a>
            {{-- <a class="btn btn-alert" href="#"> [ Filtrar Cliente ] </a>
            <a class="btn btn-success" href="#"> [ Buscar Cliente ] </a> --}}
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Player_id</th>
        <th>deposit_voucher</th>
        <th>bank</th>
        <th>channel</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($clients as $client)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $client->player_id }}</td>
        <td>{{ $client->deposit_voucher }}</td>
        <td>{{ $client->bank }}</td>
        <td>{{ $client->channel }}</td>
        <td>
            <form action="{{ route('clients.destroy',$client->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('clients.show',$client->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}">Edit</a>

                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $clients->links() !!}

@endsection

