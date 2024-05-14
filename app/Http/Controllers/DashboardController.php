<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $report =$this->post('investor/report/lender');
        if($request->ajax()) {

            $params = [
                'month'     => $request->month,
                'year'      => $request->year,
                'start'     => $request->start,
                'length'    => $request->length,
                'invest_status'    => $request->invest_status
            ];
            
            $data['table'] = $this->query('investor/report/lender', $params);
            $totalReturnAmount = 0;
            $totalReturn = 0;
            $totalMargin = 0;

            foreach ($data['table']['data'] as $item) {
                $totalReturnAmount += $item['invest_amount'];
            }
            $data['totalReturnAmount'] = $totalReturnAmount;

            foreach ($data['table']['data'] as $item) {
                $totalReturn += $item['return_amount'];
            }
            $data['totalReturn'] =  $totalReturn;
            
            foreach ($data['table']['data'] as $item) {
                $totalMargin += $item['margin'];
            }
            $data['totalMargin'] = $totalMargin;

            return view('dashboard._data_table', $data);
        }
        $data['title'] = 'Dashboard Lender';

        $data['static_report'] = Cache::remember($request->access_token . '_static_report', 3600, function() {
            return $this->get('investor/report/static');
        });
        
        $data['user'] = Cache::remember($request->access_token . '_user', 3600, function() {
            return $this->get('investor/account');
        });

        // dd($data['user']);
        return view('dashboard.index', $data);
    }
}
