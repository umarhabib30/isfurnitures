<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <a href="https://imgbb.com/"><img src="https://i.ibb.co/N2J64Sq/logo.png" alt="logo"
                style=" margin-left:40%"></a>
        <table id="mytable" class="table table-hover">
            <thead>
                <tr>
                    <th>Person-Name</th>
                    <th>Product-Name</th>
                    <th>Product-Price</th>
                    <th>Total</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mailData['items'] as $item)
                    <tr>
                        <td>{{ $mailData['order']['name'] }}</td>
                        <td>{{ $item['product']['name'] }}</td>
                        <td>{{ $item['product']['price'] }}</td>
                        <td>{{ $item['total'] }}</td>
                        <td>{{ $item['qty'] }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <P> <b>Total Bill is {{ $mailData['order']['grand_total'] }} </b></P>




    </div>


</body>

</html>
