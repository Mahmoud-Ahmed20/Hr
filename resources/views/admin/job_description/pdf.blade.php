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
    $job_title = $Arabic->utf8Glyphs("مسمي الوظيفة");
    $section = $Arabic->utf8Glyphs("القسم");
    $administration = $Arabic->utf8Glyphs("الادارة");

    ?>
    <tr>
        <td>ID</td>
        <td>{{$created_at}}</td>
        <td>{{$name_table}}</td>
        <td>{{$job_title}}</td>
        <td>{{$section}}</td>
        <td>{{$administration}}</td>

    </tr>
    </thead>
    <tbody>
    @foreach ($job_description as $oneJobDEscription)
        <tr>
            <td>{{$oneJobDEscription->id}}</td>
            <td>{{$oneJobDEscription->created_at}}</td>
            <td>{{$Arabic->utf8Glyphs($oneJobDEscription->staff->name)}}</td>
            <td>{{$Arabic->utf8Glyphs($oneJobDEscription->job_title)}}</td>
            <td>{{$Arabic->utf8Glyphs($oneJobDEscription->section->name)}}</td>
            <td>{{$Arabic->utf8Glyphs($oneJobDEscription->administration->name_administration)}}</td>

        </tr>

    @endforeach
    </tbody>
</table>
</body>
</html>
