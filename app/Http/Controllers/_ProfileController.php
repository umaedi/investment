<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if($request->ajax()) {
            $data['table'] = $this->post('investor/report/balance');
            return view('profile._data_table', $data);
        }
        $data['user'] = $this->get('investor/account');
        return view('profile.index', $data);
    }
}