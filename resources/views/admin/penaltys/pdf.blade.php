
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
                $number = $Arabic->utf8Glyphs("الرقم");
                $table_name = $Arabic->utf8Glyphs("الاسم");
                $table_administration = $Arabic->utf8Glyphs("الادارة");
                $table_sections = $Arabic->utf8Glyphs("القسم");
                $table_job_title = $Arabic->utf8Glyphs("مسمي وظيفي");
                $table_joining_date = $Arabic->utf8Glyphs("تاريخ التعيين");
                $table_last_penalty = $Arabic->utf8Glyphs("تاريخ اخر مخلفة ");
                $table_subject = $Arabic->utf8Glyphs("الموضوع");
                $table_draw_attention = $Arabic->utf8Glyphs("لفت نظر");
                $table_penalty = $Arabic->utf8Glyphs("انذار كتابي");
                $table_deduction = $Arabic->utf8Glyphs("ايام الخصم");
                $table_others = $Arabic->utf8Glyphs("أخري");
                $table_stopping_from_work_for = $Arabic->utf8Glyphs("ايقاف عن العمل لمدة");
                $table_stopping_the_yearly_increase = $Arabic->utf8Glyphs("الحرمان من الزيادة السنوية");
            ?>
            <tr>
                <td>{{$number}}</td>
                <td>{{$table_name}}</td>
                <td>{{$table_administration}}</td>
                <td>{{$table_sections}}</td>

            </tr>
        </thead>
        <tbody>
            @foreach($penaltys as $penalty)
                <?php
				     $name = $Arabic->utf8Glyphs(optional($penalty->NameEmploye)->name);
                    $administration = $Arabic->utf8Glyphs(optional($penalty->EmployeAdministration)->name_administration);
                    $section = $Arabic->utf8Glyphs(optional($penalty->NameSections)->name);
               ?>
                <tr>
					 <td>{{$penalty->id}}</td>
                     <td>{{$name}}</td>
                     <td>{{$administration}}</td>
                     <td>{{$section}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
{{-- {{'mahmoud'}} --}}
