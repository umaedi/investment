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

        $headings = [
            'No',
            'Borrower Name',
            'Loan Amount',
            'Interest',
            'Return',
            'Margin',
            'Disbursed Date',
            'Repayment Date',
            'Status',
        ];
        return Excel::download(new Reportexport($report, $headings), date('Y-m-d') . '-report-lender' . '.xlsx');
    }

    public function fundingbalance()
    {
        $addbalance = $this->post('investor/report/balance');
        return Excel::download(new Exportfundingbalance($addbalance), date('Y-m-d') .'-funding-balance-' . '.xlsx');
    }
}
