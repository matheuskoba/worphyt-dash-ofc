<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Worphyt Cadastro</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/registerstepscss/step5style.css') }}" >

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.5.2rc1.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="main-container">
    <img class="logo" src="{{ asset('img/logo.png') }}" alt="logo">
    <form method="POST" action="">
        <div class="plus box">
            <p>Idiomas</p>
            <button type="button" id="add" class="plusbutton"><i class="fa-solid fa-plus"></i></button>
        </div>
        <div id="buildyourform">

        </div>
        <div class="inputlanguage">
                <span>
                    <i class="fa-solid fa-language"></i>
                </span>
            <input type="text" name="language" placeholder="Idioma">
            <i class="fa-solid fa-trash"></i>
        </div>
        <div class="check">
            <input type="checkbox" name="presential" id="presential">
            <label for="presential">Atendimento presencial</label>
        </div>
        <div class="check adjust">
            <input type="checkbox" name="remote" id="remote">
            <label for="remote">Atendimento remoto</label>
        </div>
    </form>
    <button> <i class="fa-solid fa-arrow-right"></i> </button>
</div>

</body>
</html>
