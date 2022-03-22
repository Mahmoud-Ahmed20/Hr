<?php

namespace App\Exports;

use App\Models\Administration;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class AdministrationExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :view
    {
        $administrations = Administration::all();
        return view('admin.administration.excel',compact('administrations'));
    }
}
