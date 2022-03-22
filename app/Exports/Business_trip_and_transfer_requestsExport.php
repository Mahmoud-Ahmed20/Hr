<?php

namespace App\Exports;

use App\Http\Requests\Admin\Business_trip_and_transfer_requestsRequests\business_trip_and_transfer_requestsRequests;
use App\Models\Business_trip_and_transfer_requests;
use App\Models\Employe;
use App\Models\Staff;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Business_trip_and_transfer_requestsExport implements FromView
{
    protected $inputs;

    function __construct($inputs) {
        $this->inputs = $inputs;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view() :view
    {

        $business_trip_and_transfer_requests = Business_trip_and_transfer_requests::with(['nationalityRow','Staff'])->notArchive()->orderBy('id')->get();
        return view('admin.business_trip_and_transfer_requests.excel', [ 'business_trip_and_transfer_requests' => $business_trip_and_transfer_requests, 'inputs' => $this->inputs]);
    }
}
