<!DOCTYPE html>
<html>
<head>
    <title>отчет по наличным</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style type="text/css">
    h2{
        text-align: center;
        font-size:22px;
        margin-bottom:50px;
    }
    body{
        background:#f2f2f2;
        font-family: DejaVu Sans;
    }
    .section{
        margin-top:30px;
        padding:50px;
        background:#fff;
    }
    .pdf-btn{
        margin-top:30px;
    }
</style>
<body>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-nowrap">
            <thead>
            <tr>
                <th>Сумма</th>
                <th>Действия</th>
                <th>Комментарий</th>
                <th>Дата</th>
            </tr>
            </thead>
            <tbody>
            @foreach($finance->reverse() as $post)
                @if($post->action == 'получено')
                    <tr style="background: green; color:white">
                        <td>{{$post->amount }} руб</td>
                        <td>{{$post->action}}</td>
                        <td>{{$post->comment}}</td>
                        <td>{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}</td>
                    </tr>
                @elseif($post->action == 'отдано')
                    <tr style="background: red; color:white">
                        <td>{{$post->amount }} руб</td>
                        <td>{{$post->action}}</td>
                        <td>{{$post->comment}}</td>
                        <td>{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}</td>
                    </tr>
                @endif
            @endforeach
            <tr>
                <td>Итог:</td>
                <td>{{ $lastTotalAmount }} руб</td>
            </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
