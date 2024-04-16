<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Exportfundingbalance implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $addbalance;
    public function __construct($addbalance)
    {
        $this->addbalance = $addbalance;
    }

    public function view(): View
    {
        return view('profile._data_table', [
            'table' => $this->addbalance
        ]);
    }
}
