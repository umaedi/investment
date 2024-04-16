<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $params = $request->except('_token');
        $response = $this->query(env('APP_SERVER_V1') . 'investor/form_account', $params);
    }
}
