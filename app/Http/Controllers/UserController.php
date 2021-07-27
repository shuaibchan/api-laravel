<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Fecades\Auth;
use App\Models\User;
use Validator;
use Auth;

class UserController extends Controller
{
    public function registration(Request $request){
        $validation = Validator:: make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'required',
            'c_password'=> 'required|same:password'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 202);
        }
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        $resArr = [];
        $resArr['token'] = $user->createToken('api-application')->accessToken;
        $resArr['name'] = $user->name;

        //  Role ID
        //  SuperAdmin = 4
        //  Admin = 5
        //  User = 6
        $user->assignRole('6');
        // $new->assignRole($request->role);


        return response()->json($resArr, 200);
    }
    public function login(Request $request){
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $user = Auth::user();
            $resArr = [];
            $resArr['token'] = $user->createToken('api-application')->accessToken;
            // $resArr['name'] = $user->name;
            return response()->json($resArr, 200);
        }
        else{
            return response()->json(['error'=>'Unauthorized Access']);
        }
    }

    public function updateuser(Request $request){
        $id = Auth::id();
        // return $request->all();
        // return $id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $result = $user->save();
        // $request->user()->token()->revoke();
        return $user;
    }
}
