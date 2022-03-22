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
            font-size: 50%;
            /* transform: rotate(90deg) */
        }
        #emp td, #emp th{
            border: 1px solid #ddd;
            /* padding: 8px; */
        }
        #emp tr:nth-child(even){
            background-color: #abb4b4;
        }
        #emp th{
            /* padding-top: 12px;
            padding-bottom: 12px; */
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
    $created_at = $Arabic->utf8Glyphs("تاريخ الاضافه");
    $name_table = $Arabic->utf8Glyphs("الاسم");
    $number = $Arabic->utf8Glyphs("الرقم الوظيفي");
    $job_title = $Arabic->utf8Glyphs("المسمي الوظيفي");
    $nationality = $Arabic->utf8Glyphs("الجنسية");
    $start = $Arabic->utf8Glyphs("تاريخ ووقت البدء");
    $period = $Arabic->utf8Glyphs("مدة المهمة");
    $location = $Arabic->utf8Glyphs("موقع المهمة");
    $way = $Arabic->utf8Glyphs("وسيلة السفر");

    ?>
    <tr>
        <td>ID</td>
        <td>{{$created_at}}</td>
        <td>{{$name_table}}</td>
        <td>{{$number}}</td>
        <td>{{$job_title}}</td>
        <td>{{$nationality}}</td>
        <td>{{$start}}</td>
        <td>{{$period}}</td>
        <td>{{$location}}</td>
        <td>{{$way}}</td>
    </tr>
    </thead>
    <tbody>
    @foreach ($business_trip_and_transfer_requests as $oneItem)
        <tr>
            <td>{{$oneItem->id}}</td>
            <td>{{$oneItem->created_at}}</td>
            <td>{{(($oneItem->Staff)?$Arabic->utf8Glyphs($oneItem->Staff->name) : '')}}</td>
            <td>{{$oneItem->id_no}}</td>
            <td>{{($oneItem->position)}}</td>
            <td>{{(($oneItem->nationalityRow)?$Arabic->utf8Glyphs($oneItem->nationalityRow->name_nationality):'')}}</td>
            <td>{{$oneItem->start_date}}</td>
            <td>{{($oneItem->period_of_stay)}}</td>
            <td>{{($oneItem->destination)}}</td>
            <td>{{($oneItem->means_of_transportation)}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
