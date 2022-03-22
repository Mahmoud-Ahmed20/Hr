<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-UA-Compatible" content="ie=edge">
    <title>Generate PDF</title>
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
                $table_number = $Arabic->utf8Glyphs("الرقم");
                $table_name = $Arabic->utf8Glyphs("الاسم");
                $table_qualification = $Arabic->utf8Glyphs("المؤهل العلمي");
                $table_job_title = $Arabic->utf8Glyphs("الوظيفه");
                $table_section = $Arabic->utf8Glyphs("القسم");
                $table_extierior = $Arabic->utf8Glyphs("المظهر الخارجي");
                $table_personal = $Arabic->utf8Glyphs("الشخصيه");
                $table_team_work = $Arabic->utf8Glyphs("العمل الجماعي");
                $table_initiatire = $Arabic->utf8Glyphs("المبادره");
                $table_english = $Arabic->utf8Glyphs("اللغه الانجليزيه");
                $table_ambition = $Arabic->utf8Glyphs("الطموح");
                $table_make_decision = $Arabic->utf8Glyphs("اتخاذ القرار");
                $table_experience = $Arabic->utf8Glyphs("الخبره");
                $table_skills = $Arabic->utf8Glyphs("المهارات");
                $table_qualification_skills = $Arabic->utf8Glyphs("توافق المؤهل مع الوظيفه");
                $table_notes = $Arabic->utf8Glyphs("ملاحظات");
                $table_interview_status = $Arabic->utf8Glyphs("حاله المقابله");
                $table_interview_date = $Arabic->utf8Glyphs("تاريخ المقابله");
            ?>
            <tr>
                <td>{{$table_number}}</td>
                <td>{{$table_name}}</td>
                <td>{{$table_qualification}}</td>
                <td>{{$table_job_title}}</td>
                <td>{{$table_section}}</td>
                <td>{{$table_extierior}}</td>
                <td>{{$table_personal}}</td>
                <td>{{$table_team_work}}</td>
                <td>{{$table_initiatire}}</td>
                <td>{{$table_english}}</td>
                <td>{{$table_ambition}}</td>
                <td>{{$table_make_decision}}</td>
                <td>{{$table_experience}}</td>
                <td>{{$table_skills}}</td>
                <td>{{$table_qualification_skills}}</td>
                <td>{{$table_notes}}</td>
                <td>{{$table_interview_status}}</td>
                <td>{{$table_interview_date}}</td>
            </tr>
        </thead>
        <tbody>
            @foreach($evaluates as $evaluate)
                <?php
                    $name_val = $Arabic->utf8Glyphs($evaluate->name);
                    $qualification_val = $Arabic->utf8Glyphs($evaluate->qualification);
                    $job_title_val = $Arabic->utf8Glyphs($evaluate->job_title);
                    $section_val = $Arabic->utf8Glyphs($evaluate->section);
                    $notes_val = $Arabic->utf8Glyphs($evaluate->notes);
                    $interview_status_val = $Arabic->utf8Glyphs($evaluate->interview_status);
                ?>
                <tr>
                    <td>{{ $evaluate->id }}</td>
                    <td>{{ $name_val }}</td>
                    <td>{{ $qualification_val }}</td>
                    <td>{{ $job_title_val }}</td>
                    <td>{{ $section_val }}</td>
                    <td>{{ $evaluate->extierior }}</td>
                    <td>{{ $evaluate->personal }}</td>
                    <td>{{ $evaluate->team_work }}</td>
                    <td>{{ $evaluate->initiatire }}</td>
                    <td>{{ $evaluate->english }}</td>
                    <td>{{ $evaluate->ambition }}</td>
                    <td>{{ $evaluate->make_decision }}</td>
                    <td>{{ $evaluate->experience }}</td>
                    <td>{{ $evaluate->skills }}</td>
                    <td>{{ $evaluate->qualification_skills }}</td>
                    <td>{{ $notes_val }}</td>
                    <td>{{ $interview_status_val }}</td>
                    <td>{{ $evaluate->interview_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
