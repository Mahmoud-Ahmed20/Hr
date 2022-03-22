<?php

namespace App\Exports;

use App\Models\MissionsAccomplishment;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class missionsAccomplishmentExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $missions = MissionsAccomplishment::all();
        return view('admin.missionsAccomplishment.excel',compact('missions'));
    }

}
