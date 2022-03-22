<?php

namespace App\Exports;

use App\Models\EvaluatePersonalInterview;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class EvaluateExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($inputs)
    {
        $this->inputs = $inputs;

    }
    public function view(): View
    {
        $evaluates = EvaluatePersonalInterview::all();
        return view('admin.evaluates.excel',['evaluates'=>$evaluates,'inputs'=>$this->inputs]);
    }
}
