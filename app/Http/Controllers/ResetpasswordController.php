<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class ResetpasswordController extends Controller
{
    public function index($token)
    {
        $data['title'] = "Reset password";
        $data['token'] = $token;
        return view('auth.reset', $data);
    }

    public function reset(Request $request)
    {
        // https://dev.duluin.com/api/auth/investor/reset-password
        $response = Http::post(env('APP_SERVER') .'auth/investor/reset-password', [
            'token'     => $request->token,
            'password'  => $request->password,
            'password_confirmation'  => $request->password_confirmation,
        ]);
        
        if ($response->successful()) {
            return $this->success('ok', "Your password has been successfully reset. You can now log in using your new password. If you have any further questions or issues, please don't hesitate to contact us. Thank you!");
        } else {
            return $this->error('Internal Server Error!');
        }
    }
}
