<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

public function register(Request $request){

    $request->validate([
'name'=>'required|string',
'email'=>'required|email|unique:users,mail',
'password'=>'required|string|min:6',
]);

$user=User::create([
'name'=>$request->name,
'email'=>$request->email,
'password'=>Hash::make($request->password),
]);
return response()->json(['message'=>'Başarıyla Kayıt Olundu!',201]);
}


public function login(Request $request){

    $request->validate([

        'email'=>'required|email',
        'password'=>'required|',
        ]);
if(Auth::attempt($request->only('email','password'))){

  $user=User::where('email',$request->email)->first();
$token=$user->createToken('auth_token')->plaintextToken;

return response()->json(['token'=>$token],200);

}

return response()->json(['message'=>'Unauthorized'],401);

}



}
