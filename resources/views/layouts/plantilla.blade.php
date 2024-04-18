<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        body {

            background-color:lemonchiffon;
            font-family: Georgia, 'Times New Roman', Times, serif;
            width: 90%;
        }

        div {
            background-color: white;
        }

        h1 {
            font-size: 5em;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-3 m-1">
        <div class="row text-uppercase fw-bold">
            &nbsp;
            <a class="btn btn-primary col" href="{{ route('welcome') }}" class="btn btn-primary col">Inicio</a>
            <br/>
            &nbsp;
            <a class="btn btn-secondary col" href="{{ route('venta.create') }}">Realizar Venta</a></li>
            <br/>
            &nbsp;
            <a class="btn btn-success col" href="{{ route('facturas.index') }}">Facturas</a>
            <br/>
            &nbsp;
            <a class="btn btn-danger col" href="{{ route('inventario.index') }}">Inventario</a>
            <br/>
            &nbsp;
            <a class="btn btn-warning col" href="{{ route('inventario.create') }}">Producto Nuevo</a>
            <br/>
            &nbsp;
            <a class="btn btn-info col" href="{{ route('clientes.index') }}">Lista Clientes</a>
            <br/>
            &nbsp;
            <a class="btn btn-dark col" href="{{ route('clientes.create') }}">Cliente Nuevo</a>
        </div>
    </div>
    <br><br>
    <div class="container-fluid m-4 p-3">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <footer class="footer mt-auto py-3 text-center justify-content-bottom">
        <p>Copyright {{ date('Y') }} -- Universidad Fidélitas</p>
        <p>Proyecto Final de PHP Intermedio</p>
        <p>Desarrollado por: Sergio Rodríguez Fallas</p>

    </footer>
</body>
</html>
