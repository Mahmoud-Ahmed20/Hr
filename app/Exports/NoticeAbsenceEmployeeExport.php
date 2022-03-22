<?php

namespace App\Exports;
use App\Models\Notice_absence_employee;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\Work_certific;

class NoticeAbsenceEmployeeExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $notice_absence_employee = Notice_absence_employee::all();  
        return view('admin.notice_absence_employee.excel',compact('notice_absence_employee'));    
    }
    
}
