<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Illuminate\Support\Facades\Validator;
use Sentinel;
use DB;

class UserController extends Controller
{
    protected $_view = 'homepage/data/account/user/';

    public function index(Request $request){
        $data = Users::orderBy('created_at','desc');
        if ( $request->has('global_search') ) {
            $search = $request->get('global_search');
            $data->where(DB::raw("concat(first_name,' ',last_name)"),"like","%".$search."%")->orWhere("email","like","%".$search."%");
        } else {
            $search = null;
        }
        $data = $data->get();
        return view($this->_view.'index',compact('data','search'));
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

    public function update(Request $request, $id){
        $validation = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255'
        ];
        if ($request->post('password') != null) {
            $validation = [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'password' => 'required|min:6|same:ConfirmPassword'
            ];
            $credentials = $request->except('ConfirmPassword');
        } else {
            $credentials = $request->except('ConfirmPassword','password');
        }
        $validator = Validator::make($request->all(), $validation);
        if ( $validator->fails() ) {
            return redirect()->back()->withErrors($validator);
        }
        $user = Sentinel::findById($id);
        $user = Sentinel::update($user, $credentials);
        return redirect()->back();
    }

    public function delete($id){
        try{
            $user = Sentinel::findById($id);
            $user->delete();
            return response()->json([
                "status"    =>  "success",
                "message"   =>  "This user are removed!",
                "header"    =>  "Deleted!"
            ]);
        }catch(\Exception $e){
            return response()->json([
                "status"    =>  "error",
                "message"   =>  $e->getMessage(),
                "header"    =>  "Cancelled"
            ]);
        }
    }
}
