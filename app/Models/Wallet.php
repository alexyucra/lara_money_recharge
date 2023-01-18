<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Wallet extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id', 'balance', 'transactions'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id', 'client_id');
    }
}
