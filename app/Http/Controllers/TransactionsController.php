<?php

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TransactionsController extends Controller
{
    private function check_account($number, $ccv2, $password){
        Log::info(json_encode([$number, $ccv2, $password]));
        $account = Account::where([
            'number' => $number,
            'ccv2' => $ccv2,
        ])->first();
        if ($account and Hash::check($password, $account['password'])){
            return $account;
        }
        else
            return null;
    }

    public function check_transaction(Request $request){
        $from = Account::where('number', '=', $request->get('from'))->first();
        $to = Account::where('number', '=', $request->get('to'))->first();
        if ($from and $to){
            $to->user;
            return view('get_info_send_credit')
                ->with('data', [
                    'from' => $from,
                    'to' => $to,
                    'amount' => $request->get('amount')
                ]);
        }
        else
            return view('message')->with('data', ['message' => "Wrong Account number/numbers"]);
    }

    public function send_credit(Request $request){
        Log::info($request->get(''));
        Log::info($request->get('from_id'));
        if ($this->check_account($request->get('from_number'), $request->get('ccv2'), $request->get('password'))){
            $from = Account::findOrFail($request->get('from_id'));
            $amount = $request->get('amount');
            if ($from['balance'] >= $amount) {
                $from['balance'] -= $amount;
                $from->save();
            }
            else
                return view('message')->with('data', ['message' => "You don't have enough credit"]);

            Transaction::create([
                'from_account_id' => $request->get('from_id'),
                'to_account_id' => $request->get('to_id'),
                'amount' => $amount
            ]);

            $to = Account::find($request->get('to_id'));
            $to['balance'] += $amount;
            $to->save();

            return view('message')->with('data', ['message' => 'The credit sent to the account']);
        }
        else
            return view('message')->with('data', ['message' => 'Wrong Account number/password/ccv2']);
    }

    public function get_credit(Request $request){
        if ($this->check_account($request->get('from'), $request->get('ccv2'), $request->get('password'))){
            $from = Account::where(['number' => $request->get('from')])->first();
            $amount = $request->get('amount');
            Log::info($amount);
            if ($from['balance'] >= $amount) {
                $from['balance'] -= $amount;
                $from->save();
            }
            else
                return view('message')->with('data', ['message' => "You don't have enough credit"]);

            Transaction::create([
                'from_account_id' => Account::where('number',$request->get('from'))->first()['id'],
                'to_account_id' => null,
                'amount' => $amount
            ]);

            return view('message')->with('data', ['message' => 'You received '.$amount.' credit from your account']);
        }
        else
            return view('message')->with('data', ['message' => 'Wrong Account number/password/ccv2']);
    }

    public function origin_destination_number(){
        return view('origin_destination_number');
    }
    public function get_info_get_credit(){
        return view('get_info_get_credit');
    }
}
