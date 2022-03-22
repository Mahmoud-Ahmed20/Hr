<?php

namespace App\Exports;

use App\Models\LoanRequests;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class LoanRequestExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view() :view
    {
        $LoanRequests = LoanRequests::all();
        return view('admin.loanRequest.excel',compact('LoanRequests'));
    }

}
