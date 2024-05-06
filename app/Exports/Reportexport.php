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
        return view('dashboard._data_table', [
            'table' => $this->data
        ]);
    }

    public function headings(): array
    {
        return $this->headings;
    }
}
