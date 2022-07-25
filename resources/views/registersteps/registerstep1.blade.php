<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Worphyt Cadastro</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/registerstepscss/step1style.css') }}" >

        {{-- Fontawesome --}}
        <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>
        {{-- Jquery --}}
        <script type='text/javascript' src='//code.jquery.com/jquery-compat-git.js'></script>
        <script type='text/javascript' src='//igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js'></script>
    </head>
    <body>
        <div class="main-container">
            <img class="logo" src="{{ asset('img/logo.png') }}" alt="logo">
            <div class="contents">
                <h1> Olá {{ $user->name }}, por favor complete o seu cadastro: </h1>
            </div>
            <form method="POST" action="{{ route('personalinfo') }}">
                @csrf
                <div class="inputwhatsapp box-input">
                    <span>
                        <i class="fa-brands fa-whatsapp"></i>
                    </span>
                    <input type="text" class="whatsapp" name="whatsapp" placeholder="Whatsapp" maxlength="15">
                </div>
                <div class="inputinstagram box-input">
                    <span>
                        <i class="fa-brands fa-instagram"></i>
                    </span>
                    <input type="text" name="instagram" placeholder="Instagram">
                </div>
                <div class="inputcref box-input">
                    <span>
                        <i class="fa-solid fa-id-card-clip"></i>
                    </span>
                    <input maxlength="11" type="text" name="cref" placeholder="CREF">
                </div>
                @if($errors->all())
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif
                <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
            </form>
        </div>
        <script>
            var behavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                options = {
                    onKeyPress: function (val, e, field, options) {
                        field.mask(behavior.apply({}, arguments), options);
                    }
                };
            $('.whatsapp').mask(behavior, options);
        </script>
    </body>
</html>
