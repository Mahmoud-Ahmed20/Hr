<?php

namespace App\Exports;

use App\Models\PenaltyProcedures;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class PenaltysExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($inputs)
    {
        $this->inputs=$inputs;
    }


    public function view(): View
    {
        $penaltys = PenaltyProcedures::all();
        return view('admin.penaltys.excel',['penaltys'=>$penaltys,'inputs'=>$this->inputs]);
    }
}
