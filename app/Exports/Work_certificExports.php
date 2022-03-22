<?php

namespace App\Exports;

use App\Models\Employe;
use App\Models\Notice_absence_employee;
use App\Models\Staff;
use App\Models\Work_certific;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Work_certificExports implements FromView
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

        $work_certific = Work_certific::with(['staff'])->notArchive()->orderBy('id')->get();
        return view('admin.work_certific.excel', [ 'work_certific' => $work_certific, 'inputs' => $this->inputs]);
    }
}
