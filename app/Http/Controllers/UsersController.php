<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    use AuthenticatesUsers;
    /**
     * sign up user
     *
     * @param  Request $request
     * @return boolean
     */
    public function sign_in(Request $request){
        if (Auth::attempt([
            'name' => $request->get('name'),
            'password' => $request->get('password')
        ])){
            Auth::loginUsingId(User::where('name', '=', $request->get('name'))->first()['id'],true);
            return json_encode([
                'status' => 'OK',
                'name' => Auth::user()['name'],
            ]);
        }
        else{
            return json_encode([
                'status' => 'ERR',
                'message' => 'Wrong Entry',
            ]);
        }
    }

    /**
     * register user
     *
     * @param Request $request
     * @return string
     */
    public function register(Request $request){
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        return json_encode([
            'status' => 'OK',
            'name' => $user['name'],
            'email' => $user['email'],
        ]);
    }

    public function sign_out(){
        Auth::logout();
        return json_encode([
            'status' => 'OK',
            'message' => "You're logged out"
        ]);
    }
}
