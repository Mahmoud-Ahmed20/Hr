<?php

namespace App\Exports;

use App\Models\Section;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class SectionExports implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :view
    {
        $sections = Section::all();
        return view('admin.sections.excel',compact('sections'));
    }
}
