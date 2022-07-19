<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Worphyt Cadastro</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/registerstepscss/step6style.css') }}" >

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/92e90f8568.js" crossorigin="anonymous"></script>

</head>
<body>
<div class="main-container">
    <img class="logo" src="{{ asset('img/logo.png') }}" alt="logo">
    <div>
        <p>Academias</p>
        <i class="fa-solid fa-plus"></i>
    </div>
    <form method="POST" action="">
        <div class="inputcref">
                <span>
                    <i class="fa-solid fa-dumbbell"></i>
                </span>
            <input type="text" name="gym" placeholder="Nome da academia">
            <i class="fa-solid fa-trash"></i>
        </div>
    </form>
    <button> <i class="fa-solid fa-arrow-right"></i> </button>
</div>

</body>
</html>
