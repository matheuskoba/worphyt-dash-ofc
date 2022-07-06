<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Worphyt Dashboard</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/welcomestyle.css') }}" >

        {{-- Fontawesome --}}
        <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>
        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    <body>
        <x-pack-navbar/>
        <div class="container">
            <div class="title">
                <h2>Dashboard</h2>
                <p>Início</p>
            </div>
            <div class="all-services">
                <p>Serviços</p>
                <div class="list-services">
                    <div class="service">
                        <div class="name-service">
                            <p>Emagrecimento (Iniciante)</p>
                            <span>Treino voltado para perda rápida de peso para iniciantes</span>
                        </div>
                        <div class="buttons-service">
                            <button><i class="fa-solid fa-pen-to-square"></i></button>
                            <button><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                    <div class="service">
                        <div class="name-service">
                            <p>Hipertrofia (Iniciante)</p>
                            <span>Treino voltado para ganho rápido de massa magra para iniciantes</span>
                        </div>
                        <div class="buttons-service">
                            <button><i class="fa-solid fa-pen-to-square"></i></button>
                            <button><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                    <div class="service">
                        <div class="name-service">
                            <p>Especial Idosos</p>
                            <span>Treino voltado para idosos que precisem de acompanhamento especial na realização de atividades fisicas</span>
                        </div>
                        <div class="buttons-service">
                            <button><i class="fa-solid fa-pen-to-square"></i></button>
                            <button><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
