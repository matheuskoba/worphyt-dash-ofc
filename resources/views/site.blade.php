<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Worphyt</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sitestyle.css') }}" >
    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
    <body>
        <header>
            <img class="logo" src="{{ asset('img/logo.png') }}" alt="logo">
            <nav>
                <div class="menus">
                    <ul>
                        <li><a href="http://127.0.0.1:8000/"><i class="fa-solid fa-house"></i>Início</a></li>
                        <li><a href="http://127.0.0.1:8000/"><i class="fa-solid fa-calendar"></i>Agenda</a></li>
                        <li><a href="http://127.0.0.1:8000/"><i class="fa-solid fa-user"></i>Perfil</a></li>
                    </ul>
                </div>

                <div class="profile">
                    <a href="http://127.0.0.1:8000/dashboard">Dashboard</a>
                </div>
            </nav>
            <div class="toggle">
                <i style="color: white" class="fa-solid fa-bars open"></i>
            </div>
        </header>
        <div>
            <img class="logo" src="{{ asset('img/personal.jpg') }}" alt="logo">
        </div>
        <script>
            $(document).ready(function(){
                $('.toggle').click(function(){
                    $('nav').toggleClass('active')
                })
            })
        </script>
    </body>
</html>
