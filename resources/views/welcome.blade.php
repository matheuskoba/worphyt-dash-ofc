<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Worphyt Dashboard</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >

        {{-- Fontawesome --}}
        <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>

    </head>
    <body>
        <nav>
            <img src="{{ asset('img/logo.png') }}">
                {{-- organizaçao da navbar --}}
            <div class="alinhamento">
                <a href="http://127.0.0.1:8000"><i class="fa-solid fa-house"></i>Início</a>
                <a href="http://127.0.0.1:8000/agenda"><i class="fa-solid fa-calendar"></i>Agenda</a>
                <a href="http://127.0.0.1:8000/perfil"><i class="fa-solid fa-user"></i>Perfil</a>
            </div>

            <div>
                <img src="{{ asset('img/user.png') }}">
            </div>
        </nav>
    </body>
</html>
