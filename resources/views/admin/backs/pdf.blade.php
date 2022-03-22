<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-UA-Compatible" content="ie=edge">
    <title>Laravel 8 Generate PDF</title>
    <style>
        #emp{
            font-family: 'dejavu sans', sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        #emp td, #emp th{
            border: 1px solid #ddd;
            padding: 8px;
        }
        #emp tr:nth-child(even){
            background-color: #0bfdfd;
        }
        #emp th{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: #fff;
        }
    </style>    
</head>
<body>
    <table id="emp">
        <thead>
            <?php 
                $Arabic = new \I18N_Arabic('Glyphs');
                $number = $Arabic->utf8Glyphs("الرقم");
                $car_type = $Arabic->utf8Glyphs("نوع السياره");
                $plate_number = $Arabic->utf8Glyphs("رقم اللوحه");
                $color = $Arabic->utf8Glyphs("اللون");
                $model = $Arabic->utf8Glyphs("الموديل");
                $owner_name = $Arabic->utf8Glyphs("اسم المالك");
                $license_expiration = $Arabic->utf8Glyphs("تاريخ انتهاء الرخصه");
                $insurance_expiry = $Arabic->utf8Glyphs("تاريخ انتهاء التامين");
                $driving_auth_expiry_1 = $Arabic->utf8Glyphs("تاريخ انتهاء تاريخ القياده");
                $driver_name = $Arabic->utf8Glyphs("سائق السياره");
            ?>
            <tr>
                <td>{{$number}}</td>
                <td>{{$car_type}}</td>
                <td>{{$plate_number}}</td>
                <td>{{$color}}</td>
                <td>{{$model}}</td>
                <td>{{$owner_name}}</td>
                <td>{{$license_expiration}}</td>
                <td>{{$insurance_expiry}}</td>
                <td>{{$driving_auth_expiry_1}}</td>
                <td>{{$driver_name}}</td>
            </tr>
        </thead>
        <tbody>
            @foreach($followCars as $car)
                <?php 
                    $car_type_val = $Arabic->utf8Glyphs($car->car_type);
                    $plate_number_val = $Arabic->utf8Glyphs($car->plate_number);
                    $color_val = $Arabic->utf8Glyphs($car->color);
                    $model_val = $Arabic->utf8Glyphs($car->model);
                    $owner_name_val = $Arabic->utf8Glyphs($car->owner_name);
                    $driver_name_val = $Arabic->utf8Glyphs($car->driver_name);
                ?>
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car_type_val }}</td>
                    <td>{{ $plate_number_val }}</td>
                    <td>{{ $color_val }}</td>
                    <td>{{ $model_val }}</td>
                    <td>{{ $owner_name_val }}</td>
                    <td>{{ $car->license_expiration }}</td>
                    <td>{{ $car->insurance_expiry }}</td>
                    <td>{{ $car->driving_auth_expiry_1 }}</td>
                    <td>{{ $driver_name_val }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>