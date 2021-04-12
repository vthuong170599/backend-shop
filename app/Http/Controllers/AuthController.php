<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'accessToken' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'user' => $request->user()
        ]);
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);
        if($request->password != $request->confirmPassword){
            return response()->json(['message'=>'confirm password invalid'],402);
        }else{
            $data = [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password)
            ];
            $user = User::Create($data);
            return response()->json(['message'=>'register successfully'],200);
        }
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function user(Request $request)
    {
        $user = $request->user();
        return response()->json(['user' => $user], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * change password 
     * @param Integer id
     * @param  \Illuminate\Http\Request  $request
     */
    public function changePassword(User $user, Request $request)
    {
        $request->validate([
            'password' => 'required|string',
            'newPassword' => 'required|string',
            'confirmPassword' => 'required|string',
        ]);
        if (Hash::check($request->password, $user->password)) {
            if ($request->newPassword == $request->confirmPassword) {
                $user->find($user->id)->update(['password' => Hash::make($request->password)]);
                return response()->json(['message' => 'change password successfully'], 200);
            } else {
                return response()->json(['message' => 'confirm password invalid'], 402);
            }
        } else {
            return response()->json(['message' => 'incorrect password'], 402);
        }
    }
}
