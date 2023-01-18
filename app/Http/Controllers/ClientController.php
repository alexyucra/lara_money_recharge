<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Builder;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Wallet;
use \Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::latest()->paginate(5);
    
        return view('clients.index',compact('clients'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $validator = Validator::make($request->all(), Client::$rules);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // $client = Client::create($request->all());

        // return redirect()->route('clients.show', $client);
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(Client::$rules);
        
        $client = Client::create($validateData);
        return redirect()->route('clients.index')->with('success', 'Client registered successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $wallet = Client::from('recargas.clients as C')
            ->leftjoin('recargas.wallets as W', 'C.id', '=', 'W.client_id')
            ->where('C.id', $client->id)
            ->select('C.id','W.*')
            ->get();
        // return $client[0];
        return view('clients.show', ['wallet'=>$wallet[0],'client'=>$client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $validator = Validator::make($request->all(), Client::$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $client->update($request->all());
    
        return redirect()->route('clients.show', $client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
    
        return redirect()->route('client.index')
                        ->with('success','User deleted successfully');
    }
    // mettodos para wallet
    public function wallet(Client $client)
    {
        $wallet = Client::from('recargas.clients as C')
            ->leftjoin('recargas.wallets as W', 'C.id', '=', 'W.client_id')
            ->where('C.id', $client->id)
            ->select('C.id','W.*')
            ->get();

        // return response()->json($wallet[0]);        
        return view('clients.wallet', ['wallet'=> $wallet[0], 'client' => $client->id]);

    }
    public function recharge(Request $request, Client $client)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $wallet = $client->wallet;
        
        if($wallet){
            $wallet->balance += $request->input('amount');
            $wallet->transactions .= 'Recharged '.$request->input('amount').' on '.date('Y-m-d H:i:s').PHP_EOL;
        }else{
            $wallet = new Wallet();
            $wallet->client_id = $request->id;
            $wallet->balance += $request->input('amount');
            $wallet->transactions .= 'Recharged '.$request->input('amount').' on '.date('Y-m-d H:i:s').PHP_EOL;
        }
        $wallet->save();

        return redirect()->route('clients.show', ['wallet'=>$wallet[0],'client'=>$client]);
        
    }

    //
    public function history(Client $client)
    {
        return view('clients.history', compact('client'));
    }

    public function updateTransaction(Request $request, Client $client)
    {
        
        $validator = Validator::make($request->all(), [
            'transaction_id' => 'required|numeric|exists:clients,id',
            'amount' => 'required'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $wallet = Client::from('recargas.clients as C')
        ->leftjoin('recargas.wallets as W', 'C.id', '=', 'W.client_id')
        ->where('C.id', $client->id)
        ->select('C.id','W.*')
        ->get();
        $wallet=$wallet[0];

        $transaction = explode(PHP_EOL, $wallet->transactions)[$request->input('transaction_id')];
        
        $wallet->transactions = str_replace($transaction, 'Recharged '.$request->input('amount').' on '.date('Y-m-d H:i:s'), $wallet->transactions);
        
        $wallet->save();
        
        return redirect()->route('clients.show', ['wallet'=>$wallet,'client'=>$client]);
    }
}
