<?php

namespace App\Exports;

use App\Models\PerformanceStandardsTemplateEmployee;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class PerformanceStandardsTemplateEmployeeExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $Performances = PerformanceStandardsTemplateEmployee::all();
        return view('admin.PerformanceStandardsTemplateEmployee.excel',compact('Performances'));
    }

}
