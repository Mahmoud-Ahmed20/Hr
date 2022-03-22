<?php

namespace App\Exports;

use App\Models\UnderTheScabies;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class UnderTheScabiesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }
    public function view(): View
    {
        $UnderTheScabies = UnderTheScabies::all();
        return view('admin.UnderTheScabies.excel',['UnderTheScabies'=>$UnderTheScabies,'inputs'=>$this->inputs]);
    }
}
