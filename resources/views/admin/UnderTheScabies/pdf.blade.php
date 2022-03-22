
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
                $table_name = $Arabic->utf8Glyphs("الاسم");
                $table_administration = $Arabic->utf8Glyphs("الادارة");
                $table_section = $Arabic->utf8Glyphs("القسم");
                $table_job = $Arabic->utf8Glyphs("الوظيفة");
                $table_admin = $Arabic->utf8Glyphs("اسم المسؤول المباشر");
                $table_date_of = $Arabic->utf8Glyphs("تاريخ التعيين");
                $table_performance_appraisal_date = $Arabic->utf8Glyphs("تاريخ تقويم الاداء");
                $table_maintain_working_hours = $Arabic->utf8Glyphs("الحفاظ علي مواعيد العمل");
                $table_good_productivity_performance = $Arabic->utf8Glyphs("جودة انتاجية الاداء");
                $table_production_quantity = $Arabic->utf8Glyphs("كمية الانتاج ");
                $table_learning_ability = $Arabic->utf8Glyphs("القدرة علي التعلم");
                $table_work_progress = $Arabic->utf8Glyphs("التقدم في العمل ");
                $table_adhere_to_the_directives_instructions = $Arabic->utf8Glyphs("الالتزام بتعليمات المدير المباشر ");
                $table_initiative_and_quick_wit = $Arabic->utf8Glyphs("المبادرة وسرعه البديهة");
                $table_relationship_with_colleagues = $Arabic->utf8Glyphs("العلاقات مع الزملاء");
                $table_ability_to_organize_work = $Arabic->utf8Glyphs("القدرة علي تنظيم العمل");
                $table_take_advantage_of_working_time = $Arabic->utf8Glyphs("الافادة من وقت العمل");
                $table_direct_administrators_recommendation = $Arabic->utf8Glyphs("توصية المسؤول المباشر");
                $table_notes = $Arabic->utf8Glyphs("ملاحظات");

            ?>
                <tr>
                    <td>ID</td>
                    <td>{{$table_name}}</td>
                    <td>{{$table_administration}}</td>
                    <td>{{$table_section}}</td>
                    <td>{{$table_job}}</td>
                    <td>{{$table_admin}}</td>
                    <td>{{$table_date_of}}</td>
                    @if (in_array('performance_appraisal_date',$inputs))
                    <td>{{$table_performance_appraisal_date}}</td>
                    @endif
                    @if (in_array('maintain_working_hours',$inputs))
                    <td>{{$table_maintain_working_hours}}</td>
                    @endif
                    @if (in_array('good_productivity_performance',$inputs))
                    <td>{{$table_good_productivity_performance}}</td>
                    @endif
                    @if (in_array('production_quantity',$inputs))
                    <td>{{$table_production_quantity}}</td>
                    @endif
                    @if (in_array('learning_ability',$inputs))
                    <td>{{$table_learning_ability}}</td>
                    @endif
                    @if (in_array('work_progress',$inputs))
                    <td>{{$table_work_progress}}</td>
                    @endif
                    @if (in_array('adhere_to_the_directives_instructions',$inputs))
                    <td>{{$table_adhere_to_the_directives_instructions}}</td>
                    @endif
                    @if (in_array('initiative_and_quick_wit',$inputs))
                    <td>{{$table_initiative_and_quick_wit}}</td>
                    @endif
                    @if (in_array('relationship_with_colleagues',$inputs))
                    <td>{{$table_relationship_with_colleagues}}</td>
                    @endif
                    @if (in_array('ability_to_organize_work',$inputs))
                    <td>{{$table_ability_to_organize_work}}</td>
                    @endif
                    @if (in_array('take_advantage_of_working_time',$inputs))
                    <td>{{$table_take_advantage_of_working_time}}</td>
                    @endif
                    @if (in_array('direct_administrators_recommendation',$inputs))
                    <td>{{$table_direct_administrators_recommendation}}</td>
                    @endif
                    @if (in_array('notes',$inputs))
                    <td>{{$table_notes}}</td>
                    @endif

                </tr>
        </thead>

        <tbody>
            @foreach ($UnderTheScabies as $UnderTheScabie)
                <?php

                $name = $Arabic->utf8Glyphs(optional($UnderTheScabie->staff)->name);
                $administration = $Arabic->utf8Glyphs(optional($UnderTheScabie->administration)->name_administration);
                $section = $Arabic->utf8Glyphs(optional($UnderTheScabie->section)->name);
                $job = $Arabic->utf8Glyphs(optional($UnderTheScabie->job)->name_job);
                $admin = $Arabic->utf8Glyphs($UnderTheScabie->direct_admin_name);
                $direct_administrators_recommendation = $Arabic->utf8Glyphs($UnderTheScabie->direct_administrators_recommendation);
                $notes = $Arabic->utf8Glyphs($UnderTheScabie->notes);

                ?>
                    <tr>
                        <td>{{$UnderTheScabie->id}}</td>
                        <td>{{$name}}</td>
                        <td>{{$administration}}</td>
                        <td>{{$section}}</td>
                        <td>{{$job}}</td>
                        <td>{{$admin}}</td>
                        <td>{{$UnderTheScabie->date_of_being_hired}}</td>
                        @if (in_array('performance_appraisal_date',$inputs))
                        <td>{{$UnderTheScabie->performance_appraisal_date}}</td>
                        @endif
                        @if (in_array('maintain_working_hours',$inputs))
                        <td>{{$UnderTheScabie->maintain_working_hours}}</td>
                        @endif
                        @if (in_array('good_productivity_performance',$inputs))
                        <td>{{$UnderTheScabie->good_productivity_performance}}</td>
                        @endif
                        @if (in_array('production_quantity',$inputs))
                        <td>{{$UnderTheScabie->production_quantity}}</td>
                        @endif
                        @if (in_array('learning_ability',$inputs))
                        <td>{{$UnderTheScabie->learning_ability}}</td>
                        @endif
                        @if (in_array('work_progress',$inputs))
                        <td>{{$UnderTheScabie->work_progress}}</td>
                        @endif
                        @if (in_array('adhere_to_the_directives_instructions',$inputs))
                        <td>{{$UnderTheScabie->adhere_to_the_directives_instructions}}</td>
                        @endif
                        @if (in_array('initiative_and_quick_wit',$inputs))
                        <td>{{$UnderTheScabie->initiative_and_quick_wit}}</td>
                        @endif
                        @if (in_array('relationship_with_colleagues',$inputs))
                        <td>{{$UnderTheScabie->relationship_with_colleagues}}</td>
                        @endif
                        @if (in_array('ability_to_organize_work',$inputs))
                        <td>{{$UnderTheScabie->ability_to_organize_work}}</td>
                        @endif
                        @if (in_array('take_advantage_of_working_time',$inputs))
                        <td>{{$UnderTheScabie->take_advantage_of_working_time}}</td>
                        @endif
                        @if (in_array('direct_administrators_recommendation',$inputs))
                        <td>{{$direct_administrators_recommendation}}</td>
                        @endif
                        @if (in_array('notes',$inputs))
                        <td>{{$notes}}</td>
                        @endif
                    </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
