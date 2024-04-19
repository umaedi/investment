<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


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
        $client = new Client();

        $data = $request->except('_token', 'nik');
        $token = $_COOKIE['access_token'];
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ];

        $response = $client->post('https://dev.duluin.com/api/v1/investor/account/form_account', [
            'headers' => $headers,
            'json' => $data
        ]);
        dd($response->getBody());
        // $response = $this->query('investor/account/form_account', $params);
        // return $this->success($response);
    }
}
