<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Cliente</title>

    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
</head>
<body>

    <h1>Registro de Cliente</h1>

    <p>Ingrese los datos del cliente</p>

    <form>

        <p>Codigo del Cliente</p>
        <input type="text">

        <p>Nombre Completo</p>
        <input type="text">

        <p>Telefono</p>
        <input type="text">

        <p>Direccion</p>
        <input type="text">

        <p>Municipio</p>
        <input type="text">

        <p>Departamento</p>
        <input type="text">

        <br><br>

        <button>Guardar Registro</button>
        <button>Cancelar</button>

    </form>

</body>
</html>