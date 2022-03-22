<?php

namespace App\Exports;

use App\Models\FollowCars;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FollowCarsExport implements FromCollection,WithHeadings
{

    public function headings():array{
        return [
            'الرقم',
            'نوع السياره',
            'رقم اللوحه',
            'اللون',
            'الموديل',
            'اسم المالك',
            'تاريخ انتهاء الرخصه',
            'تاريخ انتهاء التامين',
            'تاريخ انتهاء تفويض القياده',
            'سائق السياره'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FollowCars::select(  'id', 'car_type', 'plate_number', 'color', 'model', 'owner_name', 
                                    'license_expiration', 'insurance_expiry', 'driving_auth_expiry_1', 
                                    'driver_name')->get();
    }
}
