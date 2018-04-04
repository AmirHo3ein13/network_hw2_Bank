<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = ['from_account_id', 'to_account_id', 'amount'];

    public function from(){
        return $this->belongsTo(Account::class, 'id', 'from_account_id');
    }

    public function to(){
        return $this->belongsTo(Account::class,'id','to_account_id');
    }
}
