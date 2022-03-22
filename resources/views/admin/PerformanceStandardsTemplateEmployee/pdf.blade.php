<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-UA-Compatible" content="ie=edge">
    <title>نموذج التقيم الشهري للعاملين</title>
    <style>
        #emp{
            font-family: 'dejavu sans', sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 50%;
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
                $table_name = $Arabic->utf8Glyphs('الاسم');
                $table_job_title = $Arabic->utf8Glyphs('المسمي الوظيفي');
                $table_understand = $Arabic->utf8Glyphs('القدرة علي استيعاب قواعد و أساليب العمل');
                $table_get_work_done = $Arabic->utf8Glyphs('انجاز العمل بالمستوي و الموعد المطلوب');
                $table_responding_to_work_pressure = $Arabic->utf8Glyphs('الاجتهاد و التجاوب مع ضغط الشغل');
                $table_initiative_and_innovation_at_work = $Arabic->utf8Glyphs('المبادرة و الابتكار في العمل');
                $table_accept_directives_from_managers= $Arabic->utf8Glyphs('تقبل توجيهات وانتقادات المدراء');
                $table_flexibility_and_adaptability= $Arabic->utf8Glyphs('المرونة و القدرة علي التكيف');
                $table_make_decisions_and_take_responsibility= $Arabic->utf8Glyphs('اتخاذ القرارات و تحمل المسؤولية');
                $table_personal_cleanliness= $Arabic->utf8Glyphs('النظافة الشخصية و المظهر العام');
                $table_adhere_to_corporate_policies= $Arabic->utf8Glyphs('الالتزام بأنظمة و سياسات الشركة');
                $table_teamwork= $Arabic->utf8Glyphs('العمل بروح الفريق ومهارات العمل الجماعي ');
            ?>
            <tr>
                <td>{{$number}}</td>
                <td>{{$table_name}}</td>
                <td>{{$table_job_title}}</td>
                @if (in_array('understand_business_rules',$inputs))
                <td>{{$table_understand}}</td>
                @endif
                @if (in_array('get_work_done',$inputs))
                <td>{{$table_get_work_done}}</td>
                @endif
                @if (in_array('initiative_and_innovation_at_work',$inputs))
                <td>{{$table_initiative_and_innovation_at_work}}</td>
                @endif
                <td>{{$table_accept_directives_from_managers}}</td>
                <td>{{$table_flexibility_and_adaptability}}</td>
                <td>{{$table_make_decisions_and_take_responsibility}}</td>
                <td>{{$table_personal_cleanliness}}</td>
                <td>{{$table_adhere_to_corporate_policies}}</td>
                <td>{{$table_teamwork}}</td>

            </tr>
        </thead>
        <tbody>
            @foreach($Performances as $Performance)
                <?php
                $name = $Arabic->utf8Glyphs(optional($Performance->staff)->name);
                $job_title = $Arabic->utf8Glyphs($Performance->job_title);
                ?>
                <tr>
                    <td>{{ $Performance->id }}</td>
                    <td>{{ $name }}</td>
                    <td>{{ $job_title }}</td>
                    <td>{{ $Performance->understand_business_rules }}</td>
                    <td>{{ $Performance->responding_to_work_pressure }}</td>
                    <td>{{ $Performance->initiative_and_innovation_at_work }}</td>
                    <td>{{ $Performance->accept_directives_from_managers }}</td>
                    <td>{{ $Performance->flexibility_and_adaptability }}</td>
                    <td>{{ $Performance->make_decisions_and_take_responsibility }}</td>
                    <td>{{ $Performance->personal_cleanliness}}</td>
                    <td>{{ $Performance->adhere_to_corporate_policies}}</td>
                    <td>{{ $Performance->teamwork }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
