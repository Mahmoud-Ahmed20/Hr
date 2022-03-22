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
                $created_table = $Arabic->utf8Glyphs("تاريخ الاضافه");
                $name_table = $Arabic->utf8Glyphs("الاسم");
                $active_table = $Arabic->utf8Glyphs("التفعيل");
                $archive_table = $Arabic->utf8Glyphs("ارشيف");

                $archivee_table = $Arabic->utf8Glyphs("محذوف");
                $not_archive_table = $Arabic->utf8Glyphs("غير محذوف");
                $activee_table = $Arabic->utf8Glyphs("مفعل");
                $not_Active_table = $Arabic->utf8Glyphs("غير مفعل");
            ?>
            <tr>
                <td>{{$number}}</td>
                <td>{{$created_table}}</td>
                <td>{{$name_table}}</td>
                <td>{{$active_table}}</td>
                <td>{{$archive_table}}</td>
            </tr>
        </thead>
        <tbody>
            @foreach($administrations as $administration)
                <?php $name_val = $Arabic->utf8Glyphs($administration->name_administration); ?>
                <tr>
                    <td>{{ $administration->id }}</td>
                    <td>{{ $administration->created_at }}</td>
                    <td>{{ $name_val }}</td>
                    <td>{{ $administration->is_activate == 1 ? $activee_table : $not_Active_table  }}</td>
                    <td>{{ $administration->archive == 1 ? $archivee_table : $not_archive_table  }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>