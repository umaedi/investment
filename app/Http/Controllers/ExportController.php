<?php

namespace App\Http\Controllers;

use App\Exports\Exportfundingbalance;
use App\Exports\Reportexport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function transction()
    {
        $report =$this->post('investor/report/lender');
        return Excel::download(new Reportexport($report), date('Y-m-d') . '-report-lender' . '.xlsx');
    }

    public function fundingbalance()
    {
        $addbalance = $this->post('investor/report/balance');
        return Excel::download(new Exportfundingbalance($addbalance), date('Y-m-d') .'-funding-balance-' . '.xlsx');
    }
}
