<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportExport implements FromView, WithHeadings
{
    protected $data;
    protected $headings;

    public function __construct($data, $headings)
    {
        $this->data = $data;
        $this->headings = $headings;
    }

    public function view(): View
    {
        $totalReturnAmount = 0;
        $totalReturn = 0;
        $totalMargin = 0;
            // Menjumlahkan return_amount dari setiap elemen data
            foreach ($this->data['data'] as $item) {
                $totalReturnAmount += $item['margin'];
            }
            $data['totalReturnAmount'] = '';
        return view('dashboard._data_table', [
            'table' => $this->data,
            'totalReturnAmount' => $totalReturnAmount,
            'totalReturn' =>  $totalReturn,
            'totalMargin' => $totalMargin
        ]);
    }

    public function headings(): array
    {
        return $this->headings;
    }
}
