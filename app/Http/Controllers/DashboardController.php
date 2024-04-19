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
        if($request->ajax()) {

            $params = [
                'month'     => $request->month,
                'year'      => $request->year,
                'start'     => $request->start,
                'length'    => $request->length,
                'invest_status'    => $request->invest_status
            ];
            
            $data['table'] = $this->query('investor/report/lender', $params);
            return view('dashboard._data_table', $data);
        }
        $data['title'] = 'Dashboard Lender';
        $data['static_report'] = $this->post('investor/report/static');
        return view('dashboard.index', $data);
    }
}
