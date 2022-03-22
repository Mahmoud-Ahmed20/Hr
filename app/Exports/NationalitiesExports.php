<?php

namespace App\Exports;

use App\Models\Nationality;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class NationalitiesExports implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :view
    {
        $nationalities = Nationality::all();
        return view('admin.nationlity.excel',compact('nationalities'));
    }
}
