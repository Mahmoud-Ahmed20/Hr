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
                $table_id = $Arabic->utf8Glyphs("الكود");
                $table_name = $Arabic->utf8Glyphs("الاسم");
                $table_qualification = $Arabic->utf8Glyphs("المؤهل العلمي");
                $table_job = $Arabic->utf8Glyphs("الوظيفه");
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
                    <td>{{$table_id}}</td>
                    <td>{{$table_name}}</td>
                    <td>{{$table_qualification}}</td>
                    <td>{{$table_job}}</td>
                    @if (in_array('section_id',$inputs))
                    <td>{{$table_section}}</td>
                    @endif
                    @if (in_array('extierior',$inputs))
                   <td>{{$table_extierior}}</td>
                    @endif
                    @if (in_array('personal',$inputs))
                    <td>{{$table_personal}}</td>
                    @endif
                    @if (in_array('team_work',$inputs))
                    <td>{{$table_team_work}}</td>
                    @endif
                    @if (in_array('initiatire',$inputs))
                    <td>{{$table_initiatire}}</td>
                    @endif
                    @if (in_array('english',$inputs))
                    <td>{{$table_english}}</td>
                    @endif
                    @if (in_array('ambition',$inputs))
                    <td>{{$table_ambition}}</td>
                    @endif
                    @if (in_array('make_decision',$inputs))
                    <td>{{$table_make_decision}}</td>
                    @endif
                    @if (in_array('experience',$inputs))
                    <td>{{$table_experience}}</td>
                    @endif
                    @if (in_array('skills',$inputs))
                    <td>{{$table_skills}}</td>
                    @endif
                    @if (in_array('qualification_skills',$inputs))
                    <td>{{$table_qualification_skills}}</td>
                    @endif
                    @if (in_array('notes',$inputs))
                    <td>{{$table_notes}}</td>
                    @endif
                    @if (in_array('interview_status',$inputs))
                    <td>{{$table_interview_status}}</td>
                    @endif
                    {{-- <td>{{$}}</td> --}}
                    <td>{{$table_interview_date}}</td>
                </tr>
        </thead>

        <tbody>
            @foreach ($evaluates as $evaluate)
                <?php
                    $name = $Arabic->utf8Glyphs($evaluate->name);
                    $qualification = $Arabic->utf8Glyphs($evaluate->qualification);
                    $job = $Arabic->utf8Glyphs(optional($evaluate->Job)->name_job);
                    $section = $Arabic->utf8Glyphs(optional($evaluate->Section)->name);
                    $notes = $Arabic->utf8Glyphs($evaluate->notes);
                    $interview_status = $Arabic->utf8Glyphs($evaluate->interview_status);
                ?>
                    <tr>
                        <td>{{$evaluate->id}}</td>
                        <td>{{$name}}</td>
                        <td>{{$qualification}}</td>
                        <td>{{$job}}</td>
                        @if (in_array('section_id',$inputs))
                        <td>{{$section}}</td>
                        @endif
                        @if (in_array('extierior',$inputs))
                        <td>{{$evaluate->extierior}}</td>
                        @endif
                        @if (in_array('personal',$inputs))
                        <td>{{$evaluate->personal}}</td>
                        @endif
                        @if (in_array('team_work',$inputs))
                        <td>{{$evaluate->team_work}}</td>
                        @endif
                        @if (in_array('initiatire',$inputs))
                        <td>{{$evaluate->initiatire}}</td>
                        @endif
                        @if (in_array('english',$inputs))
                        <td>{{$evaluate->english}}</td>
                        @endif
                        @if (in_array('ambition',$inputs))
                        <td>{{$evaluate->ambition}}</td>
                        @endif
                        @if (in_array('make_decision',$inputs))
                        <td>{{$evaluate->make_decision}}</td>
                        @endif
                        @if (in_array('experience',$inputs))
                        <td>{{$evaluate->experience}}</td>
                        @endif
                        @if (in_array('skills',$inputs))
                        <td>{{$evaluate->skills}}</td>
                        @endif
                        @if (in_array('qualification_skills',$inputs))
                        <td>{{$evaluate->qualification_skills}}</td>
                        @endif
                        @if (in_array('notes',$inputs))
                        <td>{{$evaluate->notes}}</td>
                        @endif
                        @if (in_array('interview_status',$inputs))
                        <td>{{$evaluate->interview_status}}</td>
                        @endif
                        <td>{{$evaluate->interview_date}}</td>
                    </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
