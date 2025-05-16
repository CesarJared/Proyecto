<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(auth()->attempt($request->only('email', 'password'))) {
            $payload = [
                'iss'=>'laravel-jwt', // Issuer of the token,
                'sub' => auth()->user()->id,
                'iat' => time(),
                'exp' => time() + 60 * 60, // Token valid for 1 hour
            ];

            $jwt = $this->generateJWT($payload);

            $subs=DB::table('subs_user')
                ->where('user_id', auth()->user()->id)
                ->first();

            return response()->json(['user'=>auth()->user(),'active'=>$subs->active,'message'=>'Login successful','token'=>$jwt]);
        }
    }
    
    private function generateJWT(array $payload)
    {
        $header = base64_encode(json_encode(['typ' => 'JWT', 'alg' => 'HS256']));
        $body = base64_encode(json_encode($payload));
        $secret = env('JWT_SECRET', 'secret');

        $signature = hash_hmac('sha256', "$header.$body", $secret, true);
        $signature = base64_encode($signature);
        return "$header.$body.$signature";
    }

    public function logout(Request $request)
    {
        // Revoke the token that was used to authenticate the user
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

}
