<?php

namespace App\Exports;

use App\Models\Employe;
use App\Models\Notice_absence_employee;
use App\Models\Staff;
use App\Models\staffsActions;
use App\Models\StaffServiceActions;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StaffsActionsExports implements FromView
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

        $staffServiceActions = StaffServiceActions::with(['section','Staff','job'])->notArchive()->orderBy('id')->get();
        return view('admin.staffServiceActions.excel', [ 'staffServiceActions' => $staffServiceActions, 'inputs' => $this->inputs]);
    }
}
