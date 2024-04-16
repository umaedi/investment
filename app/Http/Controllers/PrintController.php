<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function transction()
    {
        $data['title'] = 'Repot Lender';
        $data['table'] =  $this->post('investor/report/lender');
        return view('print._data_report_lender', $data);
    }

    public function fundingbalance()
    {
        $data['title'] = 'Repot Funding Balance';
        $data['table'] = $this->post('investor/report/balance');
        return view('print._data_table_print', $data);
    }
}
