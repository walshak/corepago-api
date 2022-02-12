<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'abandoned',
        'address',
        'amount',
        'bip125_replaceable',
        'category_id',
        'category',
        'confirmations',
        'fee',
        'label',
        'time',
        'timereceived',
        'trusted',
        'txid',
        'vout',
        'walletconflicts',
        'wallet_id',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function wallet(){
        return $this->belongsTo(Wallet::class);
    }
}
