<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Reportexport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $report;
    public function __construct($report)
    {
        $this->report = $report;
    }
    public function collection()
    {
        return $this->report;
    }

    public function view(): View
    {
        return view('dashboard._data_table_report', [
            'table' => $this->report
        ]);
    }
}
