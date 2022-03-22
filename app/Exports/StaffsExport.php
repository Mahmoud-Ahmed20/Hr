<?php

namespace App\Exports;

use App\Models\Staff;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StaffsExport implements FromView
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
        
        $staffs = Staff::all();
        return view('admin.staffs.excel', [ 'staffs' => $staffs, 'inputs' => $this->inputs]);
    }
}
