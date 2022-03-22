<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-UA-Compatible" content="ie=edge">
    <title> pdf </title>
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
                $table_location = $Arabic->utf8Glyphs("المكان");
                $table_name = $Arabic->utf8Glyphs("الاسم");
                $table_date = $Arabic->utf8Glyphs("التاريخ");
                $table_job_title = $Arabic->utf8Glyphs("مسمي وظيفي");
                $table_administration = $Arabic->utf8Glyphs("الادارة");
                $table_section = $Arabic->utf8Glyphs("القسم");
                $table_direction_of_the_mission = $Arabic->utf8Glyphs("جهة مهمة العمل");
                $table_duration_of_mission = $Arabic->utf8Glyphs("المدة");
                $table_date_from = $Arabic->utf8Glyphs("اعتبار من ");
                $table_date_to = $Arabic->utf8Glyphs("اعتبار الي");
                $table_mission_specification = $Arabic->utf8Glyphs("بيان مهمة العمل");
                $table_expense_advance = $Arabic->utf8Glyphs("سلفة مصاريف بمبلغ");
                $table_ticket = $Arabic->utf8Glyphs("تذكرة سفر خط سير");
            ?>
            <tr>
                <td>{{$number}}</td>
                <td>{{$table_name}}</td>
                <td>{{$table_location}}</td>
                <td>{{$table_date}}</td>
                <td>{{$table_job_title}}</td>
                <td>{{$table_administration}}</td>
                <td>{{$table_section}}</td>
                @if (in_array('direction_of_the_mission',$inputs))
                <td>{{$table_direction_of_the_mission}}</td>
                @endif
                @if (in_array('duration_of_mission',$inputs))
                <td>{{$table_duration_of_mission}}</td>
                @endif
                @if (in_array('date_from',$inputs))
                <td>{{$table_date_from}}</td>
                @endif
                @if (in_array('date_to',$inputs))
                <td>{{$table_date_to}}</td>
                @endif
                @if (in_array('mission_specification',$inputs))
                <td>{{$table_mission_specification}}</td>
                @endif
                @if (in_array('expense_advance',$inputs))
                <td>{{$table_expense_advance}}</td>
                @endif
                @if (in_array('ticket',$inputs))
                <td>{{$table_ticket}}</td>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($missions as $mission)
                <?php
                    $location = $Arabic->utf8Glyphs($mission->location);
                    $name = $Arabic->utf8Glyphs(optional($mission->NameEmploye)->name);
                    $job_title = $Arabic->utf8Glyphs($mission->job_title);
                    $administration = $Arabic->utf8Glyphs(optional($mission->Administration)->name_administration);
                    $section = $Arabic->utf8Glyphs(optional($mission->NameSections)->name);
                    $direction_of_the_mission = $Arabic->utf8Glyphs($mission->direction_of_the_mission);
                    $duration_of_mission = $Arabic->utf8Glyphs($mission->duration_of_mission);
                    $mission_specification = $Arabic->utf8Glyphs($mission->mission_specification);
                    $expense_advance = $Arabic->utf8Glyphs($mission->expense_advance);
                    $ticket = $Arabic->utf8Glyphs($mission->ticket);
                ?>
                <tr>
                    <td>{{ $mission->id }}</td>
                    <td>{{ $name }}</td>
                    <td>{{ $location }}</td>
                    <td>{{ $mission->date }}</td>
                    <td>{{ $job_title }}</td>
                    <td>{{ $administration }}</td>
                    <td>{{ $section }}</td>
                    @if (in_array('direction_of_the_mission',$inputs))
                    <td>{{ $direction_of_the_mission }}</td>
                    @endif
                    @if (in_array('duration_of_mission',$inputs))
                    <td>{{ $duration_of_mission }}</td>
                    @endif
                    @if (in_array('date_from',$inputs))
                    <td>{{ $mission->date_from }}</td>
                    @endif
                    @if (in_array('date_to',$inputs))
                    <td>{{ $mission->date_to }}</td>
                    @endif
                    @if (in_array('mission_specification',$inputs))
                    <td>{{ $mission->mission_specification }}</td>
                    @endif
                    @if (in_array('expense_advance',$inputs))
                    <td>{{ $mission->expense_advance }}</td>
                    @endif
                    @if (in_array('ticket',$inputs))
                    <td>{{ $mission->ticket}}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
