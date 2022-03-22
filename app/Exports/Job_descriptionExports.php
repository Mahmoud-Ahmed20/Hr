<?php

namespace App\Exports;

use App\Models\Employe;
use App\Models\Job_description;
use App\Models\Notice_absence_employee;
use App\Models\Staff;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Job_descriptionExports implements FromView
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

        $job_description = Job_description::with(['administration','staff','section'])->notArchive()->orderBy('id')->get();
        return view('admin.job_description.excel', [ 'job_description' => $job_description, 'inputs' => $this->inputs]);
    }
}
