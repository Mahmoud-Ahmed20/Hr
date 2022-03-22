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
                $table_job_title = $Arabic->utf8Glyphs("المسمي الموظيفي");
                $table_name = $Arabic->utf8Glyphs("الموظف");
                $table_data = $Arabic->utf8Glyphs("التاريخ");
                $table_start_data = $Arabic->utf8Glyphs("تاريخ بداء الخدمة");
                $table_end_data = $Arabic->utf8Glyphs("تاريخ نهاية الخدمة");
            ?>
            <tr>
                <td>{{$number}}</td>
                <td>{{$table_job_title}}</td>
                <td>{{$table_name}}</td>
                <td>{{$table_data}}</td>
                <td>{{$table_start_data}}</td>
                <td>{{$table_end_data}}</td>
            </tr>
        </thead>
        <tbody>
            @foreach($work_certific as $one_work_certific)
                <?php
                $job_title = $Arabic->utf8Glyphs($one_work_certific->job_title);

                ?>
                <tr>
                    <td>{{ $one_work_certific->id }}</td>
                    <td>{{($one_work_certific->staff)?$Arabic->utf8Glyphs($one_work_certific->staff->name) : ''}}</td>
                    <td>{{ $job_title }}</td>
                    <td>{{ $one_work_certific->date }}</td>
                    <td>{{ $one_work_certific->start_work }}</td>
                    <td>{{ $one_work_certific->end_work }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
