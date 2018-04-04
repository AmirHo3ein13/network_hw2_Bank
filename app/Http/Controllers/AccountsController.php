<?php

namespace App\Http\Controllers;

use App\Account;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountsController extends Controller
{
    public function make(){
        $password = random_int(1000,9999);
        $account = Account::create([
            'number' => $this->random_account_number(),
            'password' => Hash::make($password),
            'ccv2' => random_int(100, 9999),
            'user_id' => Auth::user()['id'],
            'expiration' => Carbon::now()->addYear(2),
            'balance' => 10000,
        ]);
        return view('show_account')
            ->with('data',['account' => $account, 'password' => $password]);
    }

    private function random_account_number(){
        $string = '';
        for ($i = 0; $i < 10; $i++){
            $string .= str_repeat($i, 16);
        }
        return substr(str_shuffle($string), 0, 16);
    }

    public function show_balance(Request $request){
        $account = Account::where([
            'number' => $request->get('number'),
            'ccv2' => $request->get('ccv2'),
        ])->first();
        if ($account and Hash::check($request->get('password'), $account['password'])){
            return view('show_balance')->with('data', ['balance' => $account->balance]);
        }
        else
            return abort(500);
    }

    public function get_balance(){
        return view('get_balance');
    }
}
