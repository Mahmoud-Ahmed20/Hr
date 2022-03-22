<?php

namespace App\Exports;

use App\Models\Employe;
use App\Models\Notice_absence_employee;
use App\Models\Staff;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Notice_absence_employeeExports implements FromView
{
    protected $inputs;

    function __construct($inputs) {
            $this->inputs = $inputs;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :view
    {

        $notice_absence_employee = Notice_absence_employee::notArchive()->orderBy('id','DESC')->get();
        return view('admin.notice_absence_employee.excel', [ 'notice_absence_employee' => $notice_absence_employee, 'inputs' => $this->inputs]);
    }
}
