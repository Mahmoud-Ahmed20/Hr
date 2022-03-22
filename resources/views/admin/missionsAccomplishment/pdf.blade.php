
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
                $table_create = $Arabic->utf8Glyphs("تاريخ الاضافه");
                $table_name = $Arabic->utf8Glyphs("الاسم");
                $table_number = $Arabic->utf8Glyphs("الرقم");
                $table_work_date = $Arabic->utf8Glyphs("تاريخ التعيين");
                $table_administration = $Arabic->utf8Glyphs("الادارة");
                $table_section = $Arabic->utf8Glyphs("القسم");
                $table_job = $Arabic->utf8Glyphs("الوظيفه");
                $table_direction = $Arabic->utf8Glyphs("جهه مهمه العمل");
                $table_duration = $Arabic->utf8Glyphs("المده");
                $table_start_working_at = $Arabic->utf8Glyphs("تاريخ البدء");
                $table_leaving_date = $Arabic->utf8Glyphs("تاريخ المغادره");
                $table_mission_details = $Arabic->utf8Glyphs("تفاصيل المهمه");
                $table_results = $Arabic->utf8Glyphs("المهام المنجزه");
            ?>
                <tr>
                    <td>ID</td>
                    <td>{{$table_create}}</td>
                    <td>{{$table_name}}</td>
                    <td>{{$table_number}}</td>
                    <td>{{$table_work_date}}</td>
                    <td>{{$table_administration}}</td>
                    <td>{{$table_section}}</td>
                    <td>{{$table_job}}</td>
                    <td>{{$table_direction}}</td>
                    <td>{{$table_duration}}</td>
                    <td>{{$table_start_working_at}}</td>
                    <td>{{$table_leaving_date}}</td>
                    <td>{{$table_mission_details}}</td>
                    <td>{{$table_results}}</td>
                </tr>
        </thead>

        <tbody>
            @foreach ($missionsAccomplishment as $mission)
                <?php
                    $name = $Arabic->utf8Glyphs(optional($mission->staff)->name);
                    $job = $Arabic->utf8Glyphs(optional($mission->job)->name_job);
                    $section = $Arabic->utf8Glyphs(optional($mission->section)->name);
                    $administration = $Arabic->utf8Glyphs(optional($mission->administration)->name_administration);
                    $direction_of_the_mission = $Arabic->utf8Glyphs($mission->direction_of_the_mission);
                    $mission_details = $Arabic->utf8Glyphs($mission->mission_details);
                    $results = $Arabic->utf8Glyphs($mission->results);
                    $duration_of_mission = $Arabic->utf8Glyphs($mission->duration_of_mission);
                ?>
                    <tr>
                        <td>{{$mission->id}}</td>
                        <td>{{$mission->created_at}}</td>
                        <td>{{$name}}</td>
                        <td>{{$mission->number}}</td>
                        <td>{{$mission->work_date}}</td>
                        <td>{{$administration}}</td>
                        <td>{{$section}}</td>
                        <td>{{$job}}</td>
                        <td>{{$direction_of_the_mission}}</td>
                        <td>{{$duration_of_mission}}</td>
                        <td>{{$mission->start_working_at}}</td>
                        <td>{{$mission->leaving_date}}</td>
                        <td>{{$mission_details}}</td>
                        <td>{{$results}}</td>
                    </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
