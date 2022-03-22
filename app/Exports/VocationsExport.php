<?php

namespace App\Exports;

use App\Models\VocationRequest;
use Illuminate\Contracts\View\View;
 use Maatwebsite\Excel\Concerns\FromView;
class VocationsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return VocationRequest::all();
    // }
    public function view(): View
    {
        $vacations = VocationRequest::all();
        return view('admin.vacations.excel',compact('vacations'));
    }
}
