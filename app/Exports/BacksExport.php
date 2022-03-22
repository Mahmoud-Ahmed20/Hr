<?php

namespace App\Exports;

use App\Models\BackToWork;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class BacksExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :view
    {
            $backs = BackToWork::all();
            return view('admin.backs.excel',compact('backs'));
    }
}
