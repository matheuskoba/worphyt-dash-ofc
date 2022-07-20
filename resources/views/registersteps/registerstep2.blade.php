<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Worphyt Cadastro</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/registerstepscss/step2style.css') }}" >

        {{-- Fontawesome --}}
        <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="main-container">
            <img class="logo" src="{{ asset('img/logo.png') }}" alt="logo">
            <div class="contents">
                <img src="{{ asset('img/user.png') }}" alt="profile">
                <a href="">Editar Foto</a>
                <textarea type="text" name="description" placeholder="Descrição"> </textarea>
            </div>
            <button> <i class="fa-solid fa-arrow-right"></i> </button>
        </div>
    </body>
</html>
