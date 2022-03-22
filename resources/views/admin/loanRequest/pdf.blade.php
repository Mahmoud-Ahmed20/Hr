
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
                $code_table = $Arabic->utf8Glyphs("الكود");
                $name_table = $Arabic->utf8Glyphs("الاسم");
                $number_table = $Arabic->utf8Glyphs("الرقم");
                $administration_table = $Arabic->utf8Glyphs("الاداره");
                $job_table = $Arabic->utf8Glyphs("الوظيفه");
                $section_table = $Arabic->utf8Glyphs("القسم");
                $going_date_table = $Arabic->utf8Glyphs("بداية العمل");
                $basic_salary_table = $Arabic->utf8Glyphs("الراتب الاساسي");
                $advance_value_table = $Arabic->utf8Glyphs("قيمه السلفة");
                $direct_manager_table = $Arabic->utf8Glyphs("موافقة المدير المباشر");
                $direct_manager_nots_table = $Arabic->utf8Glyphs("ملاحظات المدير المباشر");
                $hr_table = $Arabic->utf8Glyphs("موافقة شؤون الموظفين");
                $hr_nots_table = $Arabic->utf8Glyphs("ملاحظات شؤون الموظفين");
                $the_accountant_table = $Arabic->utf8Glyphs("موافقة قسم المحاسبه");
                $the_accountant_nots_table = $Arabic->utf8Glyphs("ملاحظات قسم المحاسبه");

                $yes_table = $Arabic->utf8Glyphs("موافق");
                $no_table = $Arabic->utf8Glyphs("غير موافق");
            ?>
            <tr>
                <td>{{$code_table}}</td>
                <td>{{$name_table}}</td>
                <td>{{$number_table}}</td>
                <td>{{$administration_table}}</td>
                <td>{{$job_table}}</td>
                <td>{{$section_table}}</td>
                <td>{{$going_date_table}}</td>
                <td>{{$basic_salary_table}}</td>
                <td>{{$advance_value_table}}</td>
                <td>{{$direct_manager_table}}</td>
                <td>{{$direct_manager_nots_table}}</td>
                <td>{{$hr_table}}</td>
                <td>{{$hr_nots_table}}</td>
                <td>{{$the_accountant_table}}</td>
                <td>{{$the_accountant_nots_table}}</td>
            </tr>
        </thead>
        <tbody>
            @foreach($LoanRequests as $LoanRequest)
                <?php
                    $staff_val = $Arabic->utf8Glyphs(optional($LoanRequest->staff)->name);
                    $administration_val = $Arabic->utf8Glyphs(optional($LoanRequest->administration)->name_administration);
                    $job_val = $Arabic->utf8Glyphs(optional($LoanRequest->job)->name_job);
                    $section_val = $Arabic->utf8Glyphs(optional($LoanRequest->section)->name);
                    $direct_manager_nots_val = $Arabic->utf8Glyphs($LoanRequest->direct_manager_nots);
                    $hr_nots_val = $Arabic->utf8Glyphs($LoanRequest->hr_nots);
                    $the_accountant_nots_val = $Arabic->utf8Glyphs($LoanRequest->the_accountant_nots);
                ?>
                <tr>
                    <td>{{ $LoanRequest->id }}</td>
                    <td>{{ $staff_val }}</td>
                    <td>{{ $LoanRequest->number }}</td>
                    <td>{{ $administration_val }}</td>
                    <td>{{ $job_val }}</td>
                    <td>{{ $section_val }}</td>
                    <td>{{ $LoanRequest->going_date }}</td>
                    <td>{{ $LoanRequest->basic_salary }}</td>
                    <td>{{ $LoanRequest->advance_value }}</td>
                    <td>{{ $LoanRequest->direct_manager == 1 ? $yes_table : $no_table }} </td>
                    <td>{{ $direct_manager_nots_val }}</td>
                    <td>{{ $LoanRequest->hr == 1 ? $yes_table : $no_table }} </td>
                    <td>{{ $hr_nots_val }}</td>
                    <td>{{ $LoanRequest->the_accountant == 1 ? $yes_table : $no_table }} </td>
                    <td>{{ $the_accountant_nots_val }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
