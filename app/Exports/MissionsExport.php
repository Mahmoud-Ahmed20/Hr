<?php

namespace App\Exports;

use App\Models\JobMissionRequest;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class MissionsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }
    public function view() :view
    {
        $missions = JobMissionRequest::all();
        return view('admin.missions.excel',['missions'=>$missions,'inputs'=>$this->inputs]);
    }
}
