<?php

namespace App\Exports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class AdminsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :view
    {
        $admins = Admin::all();
        return view('admin.admins.excel',compact('admins'));
    }
}
