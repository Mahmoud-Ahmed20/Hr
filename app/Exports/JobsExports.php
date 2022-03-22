<?php

namespace App\Exports;

use App\Models\Job;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class JobsExports implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :view
    {
        $jobs = Job::all();
        return view('admin.job.excel',compact('jobs'));
    }
}
