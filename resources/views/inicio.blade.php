<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Worphyt Dashboard</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/iniciostyle.css') }}">

        {{-- Fontawesome --}}
        <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>
        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    <body>
        <x-pack-navbar :user="$user"/>
        <div class="container">
            <div class="title">
                <h2>Dashboard</h2>
                <p>Agendamentos</p>
            </div>
            @foreach($professionals as $professional)
                <div class="card">
                    <div class="card-1 margin-right">
                        <div class="avatar">
                            <img src="{{ asset('img/user.png') }}" alt="profile">
                        </div>
                        <div class="name">
                            <h6>{{ $professional->name }}</h6>
                        </div>
                        <div class="rate">
                            @foreach(range(1,5) as $i)
                                <span class="fa-stack" style="width:1em">
                                    <i class="far fa-star fa-stack-1x"></i>
                                    @if($professional->stars >0)
                                        @if($professional->stars >0.5)
                                            <i class="fas fa-star fa-stack-1x"></i>
                                        @else
                                            <i class="fas fa-star-half fa-stack-1x"></i>
                                        @endif
                                    @endif
                                </span>
                            @endforeach
                        </div>
                        <div class="note">
                            <p>{{ $professional->stars }}</p>
                        </div>
                    </div>
                    <div class="card-2 margin-right">
                        <p>Local de atendimento:</p>
                        <h6>Bluefit</h6>
                        <p>Região:</p>
                        <h6>Taguatinga</h6>
                        <p>Objetivo:</p>
                        <h6>Hipertrofia</h6>
                    </div>
                    <div class="card-3 margin-right">
                        <p>Data:</p>
                        <h6>27/07/2022</h6>
                        <p>Hora:</p>
                        <h6>15:00</h6>
                        <p>Tipo de atendimento:</p>
                        <h6>Presencial e Remoto</h6>
                    </div>
                    <div class="card-4">
                        <div class="buttons">
                            <button><i class="fa-solid fa-x"></i></button>
                            <button><i class="fa-solid fa-check"></i></button>
                        </div>
                        <p>Contato: </p>
                        <div class="contact">
                            <a href="#">
                                <i class="fa-brands fa-whatsapp"></i>
                                <h6>Whatsapp</h6>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
</html>
