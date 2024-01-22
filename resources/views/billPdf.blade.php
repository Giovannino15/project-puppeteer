<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Modelo de facturacion de empresa con datos esenciales.</p>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Nombre Completo</th>
            <th>Empresa</th>
            <th>Numero de Telefono</th>
            <th>Pregunta de Seguridad</th>
        </tr>
        <tr>
            <td>{{ $bill->id }}</td>
            <td>{{ $bill->email }}</td>
            <td>{{ $bill->first_name }} {{ $bill->last_name }}</td>
            <td>{{ $bill->company }}</td>
            <td>{{ $bill->phone_number }}</td>
            <td>{{ $bill->security_question }}</td>
        </tr>
    </table>
  
</body>
</html>