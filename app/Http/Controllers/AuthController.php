<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $response = Http::post(env('APP_SERVER') .'auth/investor/signin', [
                'email'     => $request->email,
                'password'  => $request->password,
            ]);
            
            if ($response->successful()) {
                // Login berhasil
                $responseData = $response->json(); // Data respons dari server
                $access_token = explode('|', $responseData['access_token'])[1];
    
                setcookie("access_token", $access_token, time() + 86400, '/');
                return $this->success('/lender/dashboard', 'akses_diterima');
    
            } else {
                // Login gagal
                return $response->json(); // Data respons error dari server
            }

        }
        $data['title'] = 'Lender - Login Duluin';
        return view('auth.login', $data);
    }

    public function forgot(Request $request)
    {
        if($request->ajax()) {
            $response = Http::post(env('APP_SERVER') .'auth/investor/forgot-password', [
                'email'     => $request->email,
                'password'  => $request->password,
            ]);

            if($response->successful()) {
                dd('ok');
            }else {
                return $response->json();
            }
            
        }
        $data['title'] = 'Lender - Forgot Password Duluin';
        return view('auth.forgot', $data);
    }
}
