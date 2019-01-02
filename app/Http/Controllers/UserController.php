<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Illuminate\Support\Facades\Validator;
use Sentinel;

class UserController extends Controller
{
    protected $_view = 'homepage/data/account/user/';

    public function index(){
        $data = Users::orderBy('created_at','desc')->get();
        return view($this->_view.'index',compact('data'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'password' => 'required|min:6|same:ConfirmPassword',
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
        return redirect()->back();
    }
    
    public function show($id){
        $data = Users::find($id);
        return response()->json([
            "data"  =>  $data
        ]);
    }
}
