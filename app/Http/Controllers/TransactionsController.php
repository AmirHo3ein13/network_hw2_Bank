<?php

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function send_credit(Request $request){
        $to = DB::table('accounts')->where('number', $request->get('to'))->first();
        if ($to){
            return json_encode([
                'status' => 'ERR',
                'message' => 'Wrong Destination Number'
            ]);
        }
        $from = $this->check_account($request->get('from'), $request->get('ccv2'), $request->get('password'));
        if ($from){
            $amount = $request->get('amount');
            if ($from['balance'] >= $amount) {
                $from['balance'] -= $amount;
                $from->save();
            }
        else
            return json_encode([
                    'status' => 'ERR',
                    'message' => "Don't have enough credit"
                ]);

            $to['balance'] += $amount;
            $to->save();

            $transaction = Transaction::create([
                'from_account_id' => $request->get('from_id'),
                'to_account_id' => $request->get('to_id'),
                'amount' => $amount
            ]);



            return json_encode([
                'status' => 'OK',
                'process' => [
                    'type' => 'transaction',
                    'action' => 'send-credit',
                    'amount' => $amount,
                    'from' => $from['number'],
                    'to' => $to['number'],
                    'transaction-id' => $transaction['id'],
                ],
            ]);
        }
        else
            return json_encode([
            'status' => 'ERR',
            'message' => 'Wrong Account Information'
        ]);
    }

    public function get_credit(Request $request){
        $from = $this->check_account($request->get('from'), $request->get('ccv2'), $request->get('password'));
        if ($from){
            $amount = $request->get('amount');
            if ($from['balance'] >= $amount) {
                $from['balance'] -= $amount;
                $from->save();
            }
            else
                return json_encode([
                    'status' => 'ERR',
                    'message' => "Don't have enough credit"
                ]);

            $transaction = Transaction::create([
                'from_account_id' => Account::where('number',$request->get('from'))->first()['id'],
                'to_account_id' => null,
                'amount' => $amount
            ]);

            return json_encode([
                'status' => 'OK',
                'process' => [
                    'type' => 'transaction',
                    'action' => 'get-credit',
                    'amount' => $amount,
                    'from' => $from['number'],
                    'transaction-id' => $transaction['id'],
                ],
            ]);
        }
        else
            return json_encode([
                'status' => 'ERR',
                'message' => 'Wrong Account Information'
            ]);
    }
}
