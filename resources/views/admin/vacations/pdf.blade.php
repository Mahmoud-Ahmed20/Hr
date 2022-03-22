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
                $name = $Arabic->utf8Glyphs("الاسم");
                $job_title = $Arabic->utf8Glyphs("المسمي الوظيفي");
                $reason_for_leave = $Arabic->utf8Glyphs("سبب الاجازه");
                $first_day = $Arabic->utf8Glyphs("اول يوم");
                $last_day = $Arabic->utf8Glyphs("اخر يوم");
                $phone = $Arabic->utf8Glyphs("الهاتف");
            ?>
            <tr>
                <td>ID</td>
                <td>{{$name}}</td>
                <td>{{$job_title}}</td>
                <td>{{$reason_for_leave}}</td>
                <td>{{$first_day}}</td>
                <td>{{$last_day}}</td>
                <td>{{$phone}}</td>
            </tr>
        </thead>
        <tbody>
            @foreach($vacations as $vacation)
                <?php 
                    $staff_val = $Arabic->utf8Glyphs(optional($vacation->staff)->name);
                    $job_title_val = $Arabic->utf8Glyphs($vacation->job_title);
                    $reason_for_leave_val = $Arabic->utf8Glyphs($vacation->reason_for_leave);
                ?>
                <tr>
                    <td>{{ $vacation->id }}</td>
                    <td>{{ $staff_val }}</td>
                    <td>{{ $job_title_val }}</td>
                    <td>{{ $reason_for_leave_val }}</td>
                    <td>{{ $vacation->first_day_off }}</td>
                    <td>{{ $vacation->last_date_off }}</td>
                    <td>{{ $vacation->phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>