<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;


class ProfileController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data['table'] = $this->post('investor/report/balance');
            return view('profile._data_table', $data);
        }
        $data['user'] = $this->get('investor/account');
        return view('profile.index', $data);
    }

    public function update(Request $request)
    {
        $token = $_COOKIE['access_token'];
        $data = $request->except('_token', 'nik');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ])->post('https://dev.duluin.com/api/v1/investor/account/form_account', $data);
        
        if($response->successful()) {
            return $this->success('OK', 'Data has been updated!');
        }else {
            return $this->error('Internal Server Error');
        }
    }
}
