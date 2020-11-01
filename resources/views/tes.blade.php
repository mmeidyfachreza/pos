<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>no</th>
            <th>Nama</th>
            <th>Harga Modal</th>
        </tr>
        <?php $x=1?>
        @foreach ($collection as $nama => $item)
        <tr>
            <td>{{$x++}}</td>
            <td>{{$nama}}</td>
            <td>{{$item->first()->harga_beli}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
