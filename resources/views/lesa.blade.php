<!DOCTYPE html>
<html>
<head>
    <title>отчет по лесам</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style type="text/css">
    h2{
        text-align: center;
        font-size:10px;
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

    table {
    border-collapse: collapse;
    }

    td, th {
    border: 1px solid black;
    padding: 1px;
    }

</style>
<body>
    <table>
        <thead>
            <tr>
                <th>Признак</th>
                <th>Наименование контрагента</th>
                <th>Телефон</th>
                <th>Сумма договора</th>
                <th>Сумма оборудования</th>
                <th>Дата договора</th>
            </tr>
        </thead>
        <tbody>
            @foreach($base->reverse() as $post)
                @if($post->sign == 'оплачено')
                    <tr style="background: green; color:white">
                        <td>{{$post->sign }}</td>
                        <td>{{$post->counterparty}}</td>
                        <td>{{$post->phone}}</td>
                        <td>{{$post->contractamount}} руб</td>
                        <td>{{$post->equipment}} руб</td>
                        <td>{{$post->contract}}</td>
                    </tr>
                @elseif($post->sign == 'не оплачено')
                    <tr style="background: red; color:white">
                        <td>{{$post->sign }}</td>
                        <td>{{$post->counterparty}}</td>
                        <td>{{$post->phone}}</td>
                        <td>{{$post->contractamount}} руб</td>
                        <td>{{$post->equipment}} руб</td>
                        <td>{{$post->contract}}</td>
                    </tr>
                @elseif($post->sign == 'хороший постоянный клиент')
                    <tr style="background: LightGreen; color:black">
                        <td>{{$post->sign }}</td>
                        <td>{{$post->counterparty}}</td>
                        <td>{{$post->phone}}</td>
                        <td>{{$post->contractamount}} руб</td>
                        <td>{{$post->equipment}} руб</td>
                        <td>{{$post->contract}}</td>
                    </tr>
                @elseif($post->sign == 'ДОЛЖНИК')
                    <tr style="background: LightCoral; color:white">
                        <td>{{$post->sign }}</td>
                        <td>{{$post->counterparty}}</td>
                        <td>{{$post->phone}}</td>
                        <td>{{$post->contractamount}} руб</td>
                        <td>{{$post->equipment}} руб</td>
                        <td>{{$post->contract}}</td>
                    </tr>
                @else
                    <tr>
                        <td>{{$post->sign }}</td>
                        <td>{{$post->counterparty}}</td>
                        <td>{{$post->phone}}</td>
                        <td>{{$post->contractamount}} руб</td>
                        <td>{{$post->equipment}} руб</td>
                        <td>{{$post->contract}}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
    </table>
</body>
</html>
