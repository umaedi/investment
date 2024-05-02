<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index()
    {
        $data['title'] = 'Lender - Login';
        return view('auth.login', $data);
    }

    public function auth(Request $request)
    {
        $response = Http::post(env('APP_SERVER') .'auth/investor/signin', [
            'email'     => $request->email,
            'password'  => $request->password,
        ]);
        
        if ($response->successful()) {
            $responseData = $response->json(); 
            $access_token = explode('|', $responseData['access_token'])[1];

            setcookie("access_token", $access_token, time() + 86400, '/');
            return redirect('/lender/dashboard');

        } else {
            return $response->json();
        }
        
    }
}
