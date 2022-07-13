<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Worphyt Dashboard</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/perfilstyle.css') }}" >

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    <body>
        <x-pack-navbar/>
        <div class="container">
            <div class="head">
                <h2>Dashboard</h2>
                <p>Perfil</p>
            </div>
            <div class="profile">
                <p>Seus dados</p>
                <div class="card-profile">
                    <div class="card-header">
                        <img src="{{ asset('img/user.png') }}" alt="profile">
                        <h3>Raulisson Vinicius</h3>
                        <p>Engenheiro de Qualidade</p>
                        <span>Brasília - DF</span>
                        <a href="{{ route('auth.logout') }}">SAIR</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
