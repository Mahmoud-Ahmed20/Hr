<?php

namespace App\Exports;

use App\Models\Employe;
use App\Models\Staff;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EmployeesExport implements FromView
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

        $employees = Employe::notArchive()->orderBy('id')->get();
        return view('admin.employees.excel', [ 'employees' => $employees, 'inputs' => $this->inputs]);
    }
}
