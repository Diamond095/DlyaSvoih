<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MakeBearerToken extends Controller
{
    
public function MakeToken(LoginRequest $request)
{
     $request['password']=Hash::make($request['password']);
     $user=User::where('login', $request['login'])->where('password', $request['password']);
    if (isset($user)) {
        return 'rerg';
        // Генерация Bearer токена
        $token = Auth::user()->createToken('YourTokenName')->plainTextToken;
        
        return response()->json(['token' => $token]);
    }
    
    return response()->json(['message' => 'Неверные учетные данные'], 401);
}

}
