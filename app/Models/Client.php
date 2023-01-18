<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wallet;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['player_id', 'deposit_voucher', 'transactions', 'bank', 'channel'];

    public static $rules = [
        'player_id' => 'required|string',
        'deposit_voucher' => 'required|numeric',
        'bank' => 'required|string',
        'channel' => 'required|string|in:whatsapp,telegram',
    ];

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'client_id', 'id');
    }

    // metodo adicionar transaccion de recarga
    public function addTransaction($transaction)
    {
        $this->transactions .= $transaction.PHP_EOL;
        $this->save();
    }
}
