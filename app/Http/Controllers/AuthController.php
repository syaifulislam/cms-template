<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Sentinel;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'password' => 'required|min:6|same:passwordConfirmation',
        ]);
        if ( $validator->fails() ) {
            return redirect()->back()->withErrors($validator);
        }
        $credentials = [
            'email'         => $request->post('email'),
            'password'      => $request->post('password'),
            'first_name'    => $request->post('first_name'),
            'last_name'     => $request->post('last_name')
        ];
        $user = Sentinel::registerAndActivate($credentials);
        return redirect('/login');
    }

    public function authenticate(Request $request){
        $credentials = $request->only('email', 'password');
        $auth = Sentinel::authenticate($credentials);
        if ( !$auth ) {
            return redirect()->back();
        }
        return redirect('/index');
    }

    public function logout(){
        Sentinel::logout();
        return redirect('/login');
    }
}
