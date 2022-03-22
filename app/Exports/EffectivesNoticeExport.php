<?php

namespace App\Exports;

use App\Models\EffectiveDateNotice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EffectivesNoticeExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :view
    {
        $effectives = EffectiveDateNotice::all();
        return view('admin.effectives.excel',compact('effectives'));
    }
}
