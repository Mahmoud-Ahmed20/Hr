<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-UA-Compatible" content="ie=edge">
    <title>PDF</title>
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
                $number = $Arabic->utf8Glyphs("الكود");
                $table_name = $Arabic->utf8Glyphs("الاسم");
                $table_section = $Arabic->utf8Glyphs("القسم");
                $table_job= $Arabic->utf8Glyphs("الوظيفة");
                $table_date = $Arabic->utf8Glyphs("التاريخ");
            ?>
            <tr>
                <td>{{$number}}</td>
                <td>{{$table_name}}</td>
                <td>{{$table_section}}</td>
                <td>{{$table_job}}</td>
                <td>{{$table_date}}</td>
            </tr>
        </thead>
        <tbody>
            @foreach($notices as $notice)
                <?php
                $name = $Arabic->utf8Glyphs($notice->staff->name);
                $section = $Arabic->utf8Glyphs($notice->section->name);
                $job = $Arabic->utf8Glyphs($notice->job->name_job);
               ?>
                <tr>
                    <td>{{$notice->id}}</td>
                    <td>{{$name}}</td>
                    <td>{{$section}}</td>
                    <td>{{$job}}</td>
                    <td>{{$notice->date}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
