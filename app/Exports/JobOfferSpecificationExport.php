<?php

namespace App\Exports;

use App\Models\JobOfferSpecification;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class JobOfferSpecificationExport implements  FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    function __construct($inputs) {
        $this->inputs = $inputs;
}
    public function view() :view
    {
        $jobOffers= JobOfferSpecification::all();
        return view('admin.jobOfferSpecification.excel',['jobOffers'=>$jobOffers,'inputs'=>$this->inputs]);
    }
}
