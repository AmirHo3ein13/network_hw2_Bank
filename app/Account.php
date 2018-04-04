<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $user
 * @property mixed $transactions_from
 * @property mixed $transactions_to
 */
class Account extends Model
{
    protected $table = 'accounts';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transactions_from(){
        return $this->hasMany(Transaction::class, 'from_account_id');
    }

    public function transactions_to(){
        return $this->hasMany(Transaction::class, 'to_account_id');
    }

    protected $hidden = ['password'];

    protected $fillable = ['user_id', 'balance', 'number', 'ccv2', 'expiration', 'password'];
}
