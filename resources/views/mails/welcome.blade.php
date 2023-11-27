<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
</head>
<body style="background-color: rgb(232, 230, 230)">
    <img src="{{ asset('images/factous.png') }}" alt="" style="width: 300px; height: 150px; margin-left:30vh">
    <h1 style="background-color: rgb(225, 0, 0); text:white">Bienvenido {{$user->name}}, {{$user->apellido}}  al Club deportivo Factous</h1>
    <h3>Tus credenciales para ingresar al sistema son:</h3>
    <h2>Email: {{$user->email}}</h2>
    <h2>Contraseña: {{$user->dni - 11111111}}</h2>
    <p>No compartas tu contraseña con nadie, nadie de Factous te pedira tu contraseña</p>
</body>
</html>