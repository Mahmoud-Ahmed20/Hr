<?php

namespace App\Exports;
use App\models\PerformanceStandardsTemplateEmployee;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class PerformanceStandardsTemplateExport implements FromView
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
        $Performances = PerformanceStandardsTemplateEmployee::all();
        return view('admin.PerformanceStandardsTemplateEmployee.excel',['Performances'=>$Performances,'inputs'=>$this->inputs]);
    }
}
