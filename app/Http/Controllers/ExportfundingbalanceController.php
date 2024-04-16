<?php

namespace App\Http\Controllers;

use App\Exports\Exportfundingbalance;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportfundingbalanceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $addbalance = $this->post('investor/report/balance');
        // dd($addbalance);
        return Excel::download(new Exportfundingbalance($addbalance),'funding_balance-' . '.xlsx');
    }
}
